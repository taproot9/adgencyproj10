<?php
//include('includes/database.php');
//include('includes/user.php');
require_once ('includes/init.php');

if(!$session->is_signed_in()){
    // ../index.php =  //point cya ani : http://localhost/gallery03/index.php
    redirect("login.php");
}

if (empty($_GET['id'])){
    redirect("users.php");
}

$user = User::find_by_id($_GET['id']);
if ($user){
    $session->message("The user {$user->username} has been deleted");
    $user->delete_photo();
    redirect('users.php');
}else{
    redirect("users.php");
}
?>