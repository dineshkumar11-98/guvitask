<?php
session_start();
//print_r($_SESSION);
?>
<html>
	<meta name="viewport" content="width=device-width, inital-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration form</title>
    <link href="https://bootswatch.com/4/materia/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="dataprocess.js"></script>
<body>
	<div class="continer">
        <div class="col-md-5 mt-5 ml-5">
            <div class="card">
            <?php
                if($_SESSION){
                     echo "<h2>Name ".$_SESSION['name']."</h2><br>";
                    echo "<h2>User-Name ".$_SESSION['username']."</h2><br>";
                    echo "<h2>E-Mail ".$_SESSION['email']."</h2><br>";
                }else {
	                header("Location: index.html");
                }
            ?>
            </div>
        </div>
        <div class="mt-4 float-right">
            <button type="button" id="logout" class="btn btn-danger">Logout</button>
        </div>
    </div>
</body>
</html>