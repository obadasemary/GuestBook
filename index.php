<?php
/**
 * Created by PhpStorm.
 * User: obada
 * Date: 11/7/2015
 * Time: 7:59 PM
 */

require_once('GuestBook.php');
require_once('validation.php');

$guestbook = new GuestBook();

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];
    $guestbook->Add($name, $message);
}

$rows = $guestbook->GetAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- meta ie-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- meta mobile device-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guest Book</title>
    <!-- ################################################## -->
    <!--main bootstrap file-->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <!-- font awesome-->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <!--main style css file-->
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- ################################################### -->

    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>

    <![endif]-->
    <!-- #################################################### -->

</head>

<body>
<!--start section guest-->
<section class="guest text-center">
    <div class="container">
        <h1>Welcome To
            <small><strong>Gusetbook</strong></small>
        </h1>
    </div>
</section>
<!--end section guest-->

<!-- start section our_guestbook-->
<section class="our_posts text-center">
    <div class="post">
        <div class="container">
            <h1>All Mesages </h1>

            <div class="row">
                <?php
                foreach ($rows as $row) {
                    $id = $row['id'];
                    $namer = $row['name'];
                    $msg = $row['message'];
                    $date = $row['date'];


                    echo "<div class='col-xs-12'>
                                <div class='person text-left'>
                                <img class='img-circle' src='images/50px-Developer_icon.png' alt='guest'>
                                <a href='view.php?id=$id'><h3>$namer</h3></a>
                                <p>
                                    $msg
                                    <span>$date</span>
                                </p>
                                </div>
                            </div>
                    <!--end -->";
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- end section our_guestbook -->
<!-- start section contact us-->
<section class="contact-us text-center">

    <div class="fields">
        <div class="container">
            <div class="row">
                <h3>Please Sign Our Gusetbook</h3>
                <!-- start contact us form-->
                <form role="form" method="post" action="index.php">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control input-lg" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" class="form-control input-lg"
                                      placeholder="Your Message"></textarea>
                        </div>
                        <input type="submit" name="add" value="Add Message" class="btn btn-warning btn-lg btn-block"/>
                    </div>
                </form>
                <!-- end contact us form-->
            </div>
        </div>
    </div>
</section>
<!-- end section contact us-->
<!-- start section footer-->
<section class="footer">
    <div class="copyright text-center">
        Copyright &copy; 2015 Obada
    </div>
    </div>
</section>
<!-- end section footer-->
<!-- start Scroll To Top-->

<div id="scroll-top">
    <i class="fa fa-chevron-up fa-3x"></i>

</div>
<!-- end Scroll To Top-->


<!-- ######################################################## -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/plugins.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>


</body>
</html>
