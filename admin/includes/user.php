<?php

class User
{

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
        $result_set = self::find_this_query("select * from users where id=$id limit 1");
        $found_user = mysqli_fetch_array($result_set);
        return $found_user;
    }

    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        return$result_set;
    }

}

?>




