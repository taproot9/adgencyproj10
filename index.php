

<?php
require_once 'admin/includes/init.php';

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1 ;

$items_per_page = 4;

$items_total_count = Photo::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

//$photos = Photo::find_all();

$sql = "select * from photos ";
$sql .= "limit {$items_per_page} ";
$sql .= "offset {$paginate->offset()}";

$photos = Photo::find_by_query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adgency</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Adgency</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="admin">Admin</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-md-12">

            <div class="thumbnails row">
                <?php foreach ($photos as $photo): ?>

                    <div class="col-xs-6 col-md-3">
                        <a class="thumbnail" href="photo.php?id=<?php echo $photo->id; ?>">
                            <img class="home_page_photo img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                        </a>
                    </div>

                <?php endforeach; ?>
            </div>

            <div class="row">

                <ul class="pagination">

                    <?php
                    if ($paginate->page_total() > 1){

                        if ($paginate->has_next()){
                            echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";

                        }

                        for ($i=1; $i <= $paginate->page_total(); $i++){
                            if ($i == $paginate->current_page){
                                echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                            }else{
                                echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                            }

                        }

                        if ($paginate->has_previous()){
                            echo  "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                        }
                    }

                    ?>


                </ul>

            </div>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <!--        <div class="col-md-4">-->

        <!-- Blog Search Well -->
        <!--            <div class="well">-->
        <!--                <h4>Blog Search</h4>-->
        <!--                <div class="input-group">-->
        <!--                    <input type="text" class="form-control">-->
        <!--                    <span class="input-group-btn">-->
        <!--                            <button class="btn btn-default" type="button">-->
        <!--                                <span class="glyphicon glyphicon-search"></span>-->
        <!--                        </button>-->
        <!--                        </span>-->
        <!--                </div>-->
        <!-- /.input-group -->
        <!--            </div>-->

        <!-- Blog Categories Well -->
        <!--            <div class="well">-->
        <!--                <h4>Blog Categories</h4>-->
        <!--                <div class="row">-->
        <!--                    <div class="col-lg-6">-->
        <!--                        <ul class="list-unstyled">-->
        <!--                            <li><a href="#">Category Name</a>-->
        <!--                            </li>-->
        <!--                            <li><a href="#">Category Name</a>-->
        <!--                            </li>-->
        <!--                            <li><a href="#">Category Name</a>-->
        <!--                            </li>-->
        <!--                            <li><a href="#">Category Name</a>-->
        <!--                            </li>-->
        <!--                        </ul>-->
        <!--                    </div>-->
        <!--                    <div class="col-lg-6">-->
        <!--                        <ul class="list-unstyled">-->
        <!--                            <li><a href="#">Category Name</a>-->
        <!--                            </li>-->
        <!--                            <li><a href="#">Category Name</a>-->
        <!--                            </li>-->
        <!--                            <li><a href="#">Category Name</a>-->
        <!--                            </li>-->
        <!--                            <li><a href="#">Category Name</a>-->
        <!--                            </li>-->
        <!--                        </ul>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!-- /.row -->
        <!--            </div>-->

        <!-- Side Widget Well -->
        <!--            <div class="well">-->
        <!--                <h4>Side Widget Well</h4>-->
        <!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>-->
        <!--            </div>-->

    </div>

</div>
<!-- /.row -->

<hr>

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
