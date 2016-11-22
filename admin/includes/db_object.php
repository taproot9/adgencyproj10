<?php

class Db_Object{

    protected static $db_table = "users";

    public $errors = array();

    public $upload_errors_array = array(
        UPLOAD_ERR_OK => "There is no errors",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "A Php extension stopped the file upload"
    );
    public function set_file($file){

//        $temp_name = $_FILES['file_upload']['tmp_name'];
//        $the_file = $_FILES['file_upload']['name'];
//        $directory = "uploads";
//
//        if (move_uploaded_file($temp_name,$directory . "/" . $the_file)){
//            $the_message = "file uploaded successfully";
//        }else{
//            $the_error = $_FILES['file_upload']['error'];
//
//            $the_message = $upload_errors[$the_error];
//
//        }

        if (empty('$file') || !$file || !is_array($file)){
            $this->errors[] = "there was no file uploaded here";
            return false;
        }elseif ($file['error']){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{

            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
            return true;
        }



//        if (move_uploaded_file($this->tmp_path, $directory . SITE_ROOT . $this->user_image)){
//            $the_message = "file uploaded successfully";
//        }else{
//            $the_error  = $file['error'];
//            $the_message = $this->upload_errors_array[$the_error];
//        }

    }

    public static function find_all()
    {
//        global $database;
//        $result_set = $database->query("SELECT * FROM users");
//        return $result_set;
        return static::find_by_query("select * from " . static::$db_table ." ");
    }

    public static function find_by_id($id){
        global $database;
//        $result_set = $database->query("select * from users where id=$id limit 1");
//        $found_user = mysqli_fetch_array($result_set);
//        return $found_user;
        $the_result_array = static::find_by_query("select * from " . static::$db_table . " where id=$id limit 1");

//        if(!empty($the_result_array)){
//            $first_item = array_shift($the_result_array);
//            return $first_item;
//        }else{
//            return false;
//        }
        //or ternary style
        return !empty($the_result_array) ? array_shift($the_result_array):false;


    }

    public static function find_by_query($sql){

        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();  //this is an empty array

        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[] = static::instantiation($row);
        }

        return $the_object_array;
    }

    public static function instantiation($result_select_id){

//        $the_object = new self();
//
//        $the_object->id = $result_select_id['id'];
//        $the_object->username = $result_select_id['username'];
//        $the_object->password = $result_select_id['password'];
//        $the_object->first_name = $result_select_id['first_name'];
//        $the_object->last_name = $result_select_id['last_name'];
//
//        return $the_object;
        $calling_class = get_called_class();

        $the_object = new $calling_class;

        foreach ($result_select_id as $the_attribute => $value){

            if ($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }

        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute){

        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);

    }


    protected function properties(){
//        return get_object_vars($this);
        $properties = array();
        foreach (static::$db_table_fields as $db_field){
            if (property_exists($this,$db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }


    protected function clean_properties(){
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value){
            $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;
    }





//---------------------------------------------------------------------





    public function save(){
        return isset($this->id) ? $this->update(): $this->create();
    }

    public function create(){
        global $database;

        $properties = $this->clean_properties();

        $sql = "insert into " .static::$db_table. "(" .implode(",",array_keys($properties)). ")";
        $sql .= "VALUES ('". implode("','",array_values($properties))."')";


//        $sql .= $database->escape_string($this->username)."', '";
//        $sql .= $database->escape_string($this->password)."', '";
//        $sql .= $database->escape_string($this->first_name)."', '";
//        $sql .= $database->escape_string($this->last_name)."')";

        if ( $database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }
    }

    public function update(){
        global $database;

        $properties = $this->clean_properties();

        $properties_pairs = array();

        foreach ($properties as $key => $value){
            $properties_pairs[] = "{$key}='$value'";
        }


        $sql = "update " .static::$db_table. " set ";
        $sql .= implode(",",$properties_pairs);
        $sql .= " where id=" .$database->escape_string($this->id);


//        $sql = "update " .static::$db_table. " set ";
//        $sql .= "username= '" .$database->escape_string($this->username)    ."', ";
//        $sql .= "password= '" .$database->escape_string($this->password)    ."', ";
//        $sql .= "first_name= '" .$database->escape_string($this->first_name)."', ";
//        $sql .= "last_name= '" .$database->escape_string($this->last_name)  ."' ";
//        $sql .= " where id=" .$database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection)==1) ? true : false;

    }

    public function delete(){
        global $database;
        $sql = "delete from " .static::$db_table. " ";
        $sql .="where id=".$database->escape_string($this->id);
        $sql .=" limit 1";
        $database->query($sql);
        return (mysqli_affected_rows($database->connection)==1) ? true : false;
    }

    public static function count_all(){
        global  $database;
        $sql = "select count(*) from ".static::$db_table;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);
        return array_shift($row);
    }

}

?>


