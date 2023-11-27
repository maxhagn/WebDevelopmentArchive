<?php
// If it's going to need the database, then it's probably smart to require it before starting
require_once('database.php');

class scores {

    protected static $table_name="scores";
    public $id;
    public $percent;
    public $user_id;
    public $quiz_id;
    
    
    public static function find_by_userid($user_id=0) {
        return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE user_id = '{$user_id}'");
    }
    
    public static function find_by_quiz($quiz_id=0) {
        return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE quiz_id = '{$quiz_id}'");
    }
    
    //Common Database Methods
    public static function find_all(){
        return self::find_by_sql("SELECT * FROM ".self::$table_name."");
    }
    
    public static function find_all_done($userid=0){
       return self::find_by_sql("SELECT quiz.id, quiz.quiz_name, quiz.category_id, quiz.thumbnail, scores.percent FROM ".self::$table_name ." CROSS JOIN scores ON quiz.id=quiz_id WHERE user_id=".$userid." ORDER BY scores.id desc LIMIT 8");
    }
    
    
    
    public static function find_by_id($id=0){
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    
    public static function find_by_sql($sql=""){
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while($row = $database->fetch_array($result_set)){
            $object_array[] = self::instantiate($row);
        }
        return $object_array;
    }
    
    private static function instantiate($record){
        //Could check that $record exists and is an array
        // Simple, long-form approach;
        $object = new self;
        /*
        $object->id = $record['id'];
        $object->username   = $record['username'];
        $object->password   = $record['password'];
        $object->first_name = $record['first_name'];
        $object->last_name  = $record['last_name'];
        $object->email      = $record['email'];*/
        
        //more dynamic, short-form approach:
        foreach($record as $attribute=>$value){
            if($object->has_attribute($attribute)){
                $object->$attribute = $value;
            }
        }
        return $object;
    }
    
    private function has_attribute($attribute){
        // get_object_vars returns an associative array with all attributes (incl. private ones!) as the keys and their current values as the value
        $object_vars = get_object_vars($this);
        //We don't care about the value, we just want to know if the key exisits
        return array_key_exists($attribute, $object_vars);
    }
    
    public function create(){
        global $database;
        //Don't forget your SQL syntax and good habits:
        // - INSERT INTO table (key, key) VALUES ('value','value')
        // - single-quotes around all values
        // - escape all values to prevent SQL injection
        
        $sql  = "INSERT INTO ".self::$table_name." (";
        $sql .= "percent, user_id, quiz_id";
        $sql .= ") VALUES ('";
        $sql .= $database->escape_value($this->percent) ."', '";
        $sql .= $database->escape_value($this->user_id) ."', '";
        $sql .= $database->escape_value($this->quiz_id) ."')";
        
        if($database->query($sql)){
            $this->id = $database->insert_id();
            return true;
        }else{
            return false;
        }
    }
    
    public function delete(){
        global $database;
        $sql  = "DELETE FROM ".self::$table_name." ";
        $sql .= "WHERE id=". $database->escape_value($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
    }
    
}
?>