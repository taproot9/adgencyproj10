<?php
//include('includes/database.php');
//include('includes/user.php');
require_once ('includes/init.php');

if(!$session->is_signed_in()){
    // ../index.php =  //point cya ani : http://localhost/gallery03/index.php
    redirect("login.php");
}

if (empty($_GET['id'])){
    redirect("comments.php");
}

$comment = Comment::find_by_id($_GET['id']);
if ($comment){
    $comment->delete();
    $session->message("The comment with {$comment->id} has been deleted");
    redirect('comments.php');

}else{
    redirect("comments.php");
}
?>