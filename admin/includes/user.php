<?php

class User{

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users()
    {
//        global $database;
//        $result_set = $database->query("SELECT * FROM users");
//        return $result_set;
        return self::find_this_query("select * from users");
    }

    public static function find_user_by_id($id){
//        global $database;
//        $result_set = $database->query("select * from users where id=$id limit 1");
//        $found_user = mysqli_fetch_array($result_set);
//        return $found_user;
        $the_result_array = self::find_this_query("select * from users where id=$id limit 1");

//        if(!empty($the_result_array)){
//            $first_item = array_shift($the_result_array);
//            return $first_item;
//        }else{
//            return false;
//        }
        //or ternary style
        return !empty($the_result_array) ? array_shift($the_result_array):false;


    }

    public static function find_this_query($sql){

        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();  //this is an empty array

        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[] = self::instantiation($row);
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

        $the_object = new self();

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

    public static function verify_user($username, $password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "select * from users where ";
        $sql .="username='{$username}' ";
        $sql .="and password='{$password}' ";
        $sql .="limit 1";

        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    public function create(){
        global $database;
        $sql = "insert into users (username, password, first_name, last_name)";
        $sql .=" VALUES ('";
        $sql .= $database->escape_string($this->username)."', '";
        $sql .= $database->escape_string($this->password)."', '";
        $sql .= $database->escape_string($this->first_name)."', '";
        $sql .= $database->escape_string($this->last_name)."')";

        if ( $database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }
    }

    public function update(){
        global $database;

        $sql = "update users set ";
        $sql .= "username= '" .$database->escape_string($this->username)    ."', ";
        $sql .= "password= '" .$database->escape_string($this->password)    ."', ";
        $sql .= "first_name= '" .$database->escape_string($this->first_name)."', ";
        $sql .= "last_name= '" .$database->escape_string($this->last_name)  ."' ";
        $sql .= " where id=" .$database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection)==1) ? true : false;

    }

    public function delete(){
        global $database;
        $sql = "delete from users ";
        $sql .="where id=".$database->escape_string($this->id);
        $sql .=" limit 1";
        $database->query($sql);
        return (mysqli_affected_rows($database->connection)==1) ? true : false;
    }
} //end of class user

?>





