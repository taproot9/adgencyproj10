<?php
//include('includes/database.php');
//include('includes/user.php');
require_once ('includes/init.php');

if(!$session->is_signed_in()){
    // ../index.php =  //point cya ani : http://localhost/gallery03/index.php
    redirect("login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Visit Home Page</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-footer">
                        <a href="#">Read All New Messages</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="users.php"><i class="fa fa-fw fa-bar-chart-o"></i> Users</a>
                </li>
                <li>
                    <a href="upload.php"><i class="fa fa-fw fa-table"></i> Upload</a>
                </li>
                <li>
                    <a href="photos.php"><i class="fa fa-fw fa-table"></i> Photos</a>
                </li>
                <li>
                    <a href="comments.php"><i class="fa fa-fw fa-edit"></i> Comments</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Admin
                        <small>Dashboard</small>
                    </h1>

                    <?php

                    //                    $sql = "select * from users where id=1";
                    //
                    //                    $result = $database->query($sql);
                    //                    $user_found = mysqli_fetch_array($result);
                    //
                    //                    echo $user_found['username'];



                    //                    $user = new User();
                    //                    $result_set = $user->find_all_users();
                    //                    while ($row = mysqli_fetch_array($result_set)){
                    //                        echo $row['username']. '<br>';
                    //                    }
                    //                    echo '<br>';

                    //use static method
                    //                    $result_set = User::find_all_users();
                    //                    while($row = mysqli_fetch_array($result_set)){
                    //
                    //                        echo $row['username'] . "<br>";
                    //
                    //                    }

                    //
                    //
                    //                    $result_select_id = User::find_user_by_id(1);
                    //                    echo $result_select_id['first_name'];
                    //
                    //                    echo '<br>';
                    //                    echo '<br>';

                    //use OOP style

                    //                    $result_select_id = User::find_user_by_id(1);
                    //                    $result = User::instantiation($result_select_id);
                    //                    echo $result->last_name;
                    //                    echo '<br>';
                    //                    echo '<br>';



                    //                    $users = User::find_all();
                    //                    foreach ($users as $user){
                    //                        echo $user->username.'<br>';
                    //                    }



                    //                    $result_select_id = User::find_user_by_id(1);
                    //                    echo $result_select_id->last_name;


                    /*
                     * CRUD FOR THE USERS TABLE
                     */

                    //create User
                    //                    $user = new User();
                    //                    $user->username = "ryan.com";
                    //                    $user->password = "123";
                    //                    $user->first_name = "ryan";
                    //                    $user->last_name = "boter";
                    //                    $user->create();

                    //update User
                    //                    $user = User::find_user_by_id(5);
                    //                    $user->last_name = "Comajig";
                    //                    $user->update();

                    //delete User
                    //                    $user = User::find_user_by_id(7);
                    //                    $user->delete();

                    /*
                     * ABSTRACTION
                     */

                    //update User
                    //                    $user = User::find_user_by_id(6);
                    //                    $user->last_name = "Dela";
                    //                    $user->password = "123";
                    //                    $user->first_name = "Marimar";
                    //                    $user->save();


                    //create User
                    //                    $user = new User();
                    //                    $user->username = "whatever";
                    //                    $user->save();







                    //PHOTO CLass

                    //find photo
                    //                    $photos = Photo::find_all();
                    //                    foreach ($photos as $photo){
                    //                        echo $photo->title .'<br>';
                    //                    }

                    //create Photo
                    //                    $photos = new Photo();
                    //                    $photos->title = "Title 2";
                    //                    $photos->description = "Desc 2";
                    //                    $photos->filename = "img.jpg";
                    //                    $photos->type = "jpg";
                    //                    $photos->size = 23;
                    //                    $photos->create();


                    ?>



                    <!--                    <ol class="breadcrumb">-->
                    <!--                        <li>-->
                    <!--                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>-->
                    <!--                        </li>-->
                    <!--                        <li class="active">-->
                    <!--                            <i class="fa fa-file"></i> Blank Page-->
                    <!--                        </li>-->
                    <!--                    </ol>-->

                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $session->count; ?></div>
                                            <div>News Views</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">Page View from Gallery</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-picture-o fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo Photo::count_all(); ?></div>
                                            <div>Photos</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="photos.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Photos in Gallery</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo User::count_all(); ?></div>
                                            <div>Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Users</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-support fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo Comment::count_all(); ?></div>
                                            <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="comments.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Comments</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div id="piechart" style="width: 900px; height: 500px;"></div>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Views',       <?php echo $session->count; ?>],
            ['Comments',    <?php echo Comment::count_all(); ?>],
            ['Users',       <?php echo User::count_all(); ?>],
            ['Photos',      <?php echo Photo::count_all(); ?>]
        ]);

        var options = {
            legend: 'none',
            pieSliceText: 'label',
            title: 'My Daily Activities',
            backgroundColor: 'transparent'

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

</body>

</html>
