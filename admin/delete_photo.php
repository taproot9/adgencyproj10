<?php
//include('includes/database.php');
//include('includes/user.php');
require_once ('includes/init.php');

if(!$session->is_signed_in()){
    // ../index.php =  //point cya ani : http://localhost/gallery03/index.php
    redirect("login.php");
}

if (empty($_GET['id'])){
    redirect("photos.php");
}

$photo = Photo::find_by_id($_GET['id']);
if ($photo){
    $photo->delete_photo();
    redirect('photos.php');
}else{
    redirect("photos.php");
}
?>