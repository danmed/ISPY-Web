<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cameras</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>
<?php
$date7 = new DateTime('7 days ago');
$date6 = new DateTime('6 days ago');
$date5 = new DateTime('5 days ago');
$date4 = new DateTime('4 days ago');
$date3 = new DateTime('3 days ago');
$date2 = new DateTime('2 days ago');
$date1 = new DateTime('1 days ago');
$date = new DateTime('Today');
$camera = $_GET['cam'];
$title = $_GET['title'];
?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                 <a class="navbar-brand" href="index.php">Cameras</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

				<li><a href="#">Dates</a></li>
						<li><a href="<?PHP echo $_SERVER['PHP_SELF'];?>?date=<?php echo $date->format('Y-m-d')?>&title=<?PHP echo $title; ?>&cam=<?PHP echo $camera;?>"><?php echo $date->format('d-m-Y')?></a></li>
						<li><a href="<?PHP echo $_SERVER['PHP_SELF'];?>?date=<?php echo $date1->format('Y-m-d')?>&title=<?PHP echo $title; ?>&cam=<?PHP echo $camera;?>""><?php echo $date1->format('d-m-Y')?></a></li>
						<li><a href="<?PHP echo $_SERVER['PHP_SELF'];?>?date=<?php echo $date2->format('Y-m-d')?>&title=<?PHP echo $title; ?>&cam=<?PHP echo $camera;?>""><?php echo $date2->format('d-m-Y')?></a></li>
						<li><a href="<?PHP echo $_SERVER['PHP_SELF'];?>?date=<?php echo $date3->format('Y-m-d')?>&title=<?PHP echo $title; ?>&cam=<?PHP echo $camera;?>""><?php echo $date3->format('d-m-Y')?></a></li>
						<li><a href="<?PHP echo $_SERVER['PHP_SELF'];?>?date=<?php echo $date4->format('Y-m-d')?>&title=<?PHP echo $title; ?>&cam=<?PHP echo $camera;?>""><?php echo $date4->format('d-m-Y')?></a></li>
						<li><a href="<?PHP echo $_SERVER['PHP_SELF'];?>?date=<?php echo $date5->format('Y-m-d')?>&title=<?PHP echo $title; ?>&cam=<?PHP echo $camera;?>""><?php echo $date5->format('d-m-Y')?></a></li>
						<li><a href="<?PHP echo $_SERVER['PHP_SELF'];?>?date=<?php echo $date6->format('Y-m-d')?>&title=<?PHP echo $title; ?>&cam=<?PHP echo $camera;?>""><?php echo $date6->format('d-m-Y')?></a></li>
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
<?php
 
$date = $_GET['date'];
$title = $_GET['title'];
$camera = $_GET['cam'];
$dir = 'files/video/' . $camera;

$files = array_slice(scandir($dir,1), 2);
$files =  preg_grep('/^([^.])/', $files);
?>

            <div class="col-lg-12">
                <h1 class="page-header"><?PHP echo $title;?> - <?PHP echo $date;?></h1>
            </div>


<?PHP
foreach($files as $ind_file){
if($ind_file != 'data.xml'){
if (strpos($ind_file, $date) !== false) {
$thumb = preg_replace('/\\.[^.\\s]{3,4}$/', '', $ind_file);
$thumbpath = $dir . '/thumbs/' . $thumb . '.jpg';
?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="display.php?title=<?PHP echo $title; ?>&cam=<?PHP echo $camera; ?>&file=<?php echo $dir."/".$ind_file;?>"><img class="img-responsive" src="<?php echo $thumbpath?>" width="400" height="300" alt=""></a><center><?PHP echo $thumb;?>        
            </div>
<?php
}}}
?>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Dan Medhurst 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
