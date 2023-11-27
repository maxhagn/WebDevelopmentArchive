<?php
class Quiz {
    
    protected static $table_name="quiz";
    protected static $db_fields=array('id', 'quiz_name' , 'category_id', 'thumbnail');
    public $id;
    public $quiz_name;
    public $category_id;
    public $thumbnail;
        
    
    public static function find_random(){
        global $database;
        $kek = $database->query("SELECT id FROM ".self::$table_name ." ORDER BY rand() LIMIT 1");
			while($subject = mysqli_fetch_assoc($kek)) {
               return $subject["id"];
			}
    }
    public static function find_by_category($id=0){
        return self::find_by_sql("SELECT * FROM ".self::$table_name ." WHERE category_id = " .$id);
    }
    
    
    	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  }
    
    public static function find_8() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." order by id desc LIMIT 8");
  }
  
  public static function find_by_id($id=0) {
	  global $database;
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id=".$database->escape_value($id)." LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  }
  
  public static function find_by_sql($sql="") {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
    }
    return $object_array;
  }

	private static function instantiate($record) {
		// Could check that $record exists and is an array
    $object = new self;
		// Simple, long-form approach:
		// $object->id 				= $record['id'];
		// $object->username 	= $record['username'];
		// $object->password 	= $record['password'];
		// $object->first_name = $record['first_name'];
		// $object->last_name 	= $record['last_name'];
		
		// More dynamic, short-form approach:
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}

	private function has_attribute($attribute) {
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// return an array of attribute names and their values
	  $attributes = array();
	  foreach(self::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}
	
	protected function sanitized_attributes() {
	  global $database;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }
	  return $clean_attributes;
	}
}
?>