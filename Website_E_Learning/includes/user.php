<?php
// If it's going to need the database, then it's probably smart to require it before starting
require_once('database.php');

class User {

    protected static $table_name="users";
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $email;
    
    public function full_name(){
        if(isset($this->first_name) && isset($this->last_name)){
            return $this->first_name . " " . $this->last_name;
        } else {
            return "";
        }
    }
    
    //equals to password_verify(), password_verify($password, $existing_hash);
    public static function password_check($password, $existing_hash){
        // existing hash contains format and salt at start
        $hash = crypt($password, $existing_hash);
        if ($hash === $existing_hash) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function authenticate($username="",$password=""){
        global $database;
        $username = $database->escape_value($username);
        $password = $database->escape_value($password);
        
        $user = self::find_by_username($username);
        if ($user) {
            // found user, now check password
            if (self::password_check($password, $user->password)) {
                // password matches
                return $user;
            } else {
                // password does not match
                return false;
            }
        } else {
            // user not found
            return false;
        }
    }
    
    public static function find_by_username($username="") {
        global $database;
		$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE username = '{$username}' LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    
    public static function find_by_email($email="") {
        global $database;
		$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE email = '{$email}' LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    
    
    //Common Database Methods
    public static function find_all(){
        return self::find_by_sql("SELECT * FROM ".self::$table_name."");
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
    
    //equals to password_hash(), password_hash($password, PASSWORD_DEFAULT); ,
    //password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    private static function password_encrypt($password){
        $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
        $salt_length = 22; 					// Blowfish salts should be 22-characters or more
        $salt = self::generate_salt($salt_length);
        $format_and_salt = $hash_format . $salt;
        $hash = crypt($password, $format_and_salt);
        return $hash;
    }

    private static function generate_salt($length){
        // Not 100% unique, not 100% random, but good enough for a salt
        // MD5 returns 32 characters
        $unique_random_string = md5(uniqid(mt_rand(), true));

        // Valid characters for a salt are [a-zA-Z0-9./]
        $base64_string = base64_encode($unique_random_string);

        // But not '+' which is valid in base64 encoding
        $modified_base64_string = str_replace('+', '.', $base64_string);

        // Truncate string to the correct length
        $salt = substr($modified_base64_string, 0, $length);

        return $salt;
    }
    
    public function create(){
        global $database;
        //Don't forget your SQL syntax and good habits:
        // - INSERT INTO table (key, key) VALUES ('value','value')
        // - single-quotes around all values
        // - escape all values to prevent SQL injection
        
        $hashed_password = self::password_encrypt($database->escape_value($this->password));
        $sql  = "INSERT INTO ".self::$table_name." (";
        $sql .= "username, password, first_name, last_name, email";
        $sql .= ") VALUES ('";
        $sql .= $database->escape_value($this->username) ."', '";
        $sql .= $database->escape_value($hashed_password) ."', '";
        $sql .= $database->escape_value($this->first_name) ."', '";
        $sql .= $database->escape_value($this->last_name) ."', '";
        $sql .= $database->escape_value($this->email) ."')";
        
        if($database->query($sql)){
            $this->id = $database->insert_id();
            return true;
        }else{
            return false;
        }
    }
    
    public function update(){
        global $database;
        
        $sql  = "UPDATE ".self::$table_name." SET ";
        $sql .= "username='". $database->escape_value($this->username) ."', ";
        $sql .= "first_name='". $database->escape_value($this->first_name) ."', ";
        $sql .= "last_name='". $database->escape_value($this->last_name) ."', ";
        $sql .= "email='". $database->escape_value($this->email) ."' ";
        $sql .= "WHERE id=". $database->escape_value($this->id);
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
    }
    
        public function updatepassword(){
        global $database;
        
        $hashed_password = self::password_encrypt($database->escape_value($this->password));
        
        $sql  = "UPDATE ".self::$table_name." SET ";
        $sql .= "password='". $database->escape_value($hashed_password) ."' ";
        $sql .= "WHERE id=". $database->escape_value($this->id);
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
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