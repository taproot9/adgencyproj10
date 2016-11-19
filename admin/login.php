<?php

require_once "includes/init.php";

if ($session->is_signed_in()){
    redirect("index.php");
}

if (isset($_POST['submit'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //method to check the database user

    $user_found = User::verify_user($username, $password);

    if($user_found){
        $session->login($user_found);
        redirect("index.php");
    }else{
        $the_message = "the password or username are incorrect";
    }

}else{
    $the_message="";
    $username = "";
    $password = "";

}


?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h4 class="bg-danger"><?php echo $the_message;?></h4>
        <form action="" method="post">

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username);?>">
            </div>

            <div class="form-group">
                <label for="username">Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password);?>">
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>

        </form>
    </div>
</div>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>


