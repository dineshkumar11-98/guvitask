<?php
    include "dp.php";
    session_start();
    $age = 'N/A';
    $dob = 'N/A';
    $contact = 'N/A';
    if($_SESSION['username']){
        $query = "select * from user_details;";
        $dataCollect = $connect->prepare($query);
        $dataCollect->execute();
        $getRawData = $dataCollect->get_result();
        if($getRawData){
            while($refinedData = $getRawData->fetch_assoc()){
                if($refinedData['User_name'] == $_SESSION['username']){
                    if($refinedData['Age']){
                        $age = $refinedData['Age'];
                    }
                    if($refinedData['DOB']){
                        $dob = $refinedData['DOB'];
                    }
                    if($refinedData['Contact']){
                        $contact = $refinedData['Contact'];
                    }
                    break;
                }
            }
        }
    }else{
        header("Location: index.html");
    }
?>
<html lang="en">
	<meta name="viewport" content="width=device-width, inital-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration form</title>
    <link href="https://bootswatch.com/4/materia/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="dataprocess.js"></script>
<body>
	<div class="continer">
        <div class="col-md-5 mx-auto my-5">
            <div class="card">
                <p class="card-header text-center">
                    Prosnal detils
                </p>
                <div class='card-body'>
                    <?Php
                        echo "<h2>Name: <span class='lead'>".$_SESSION['name']."</span></h2>";
                        echo "<h2>User-Name: <span class='lead'>".$_SESSION['username']."</span></h2>";
                        echo "<h2>E-Mail: <span class='lead'>".$_SESSION['email']."</span></h2>";
                        echo "<div id='pdata'><h2>Age: <span class='lead'>".$age."</span></h2>";
                        echo "<h2>D.O.B: <span class='lead'>".$dob."</span></h2>";
                        echo "<h2>Contact: <span class='lead'>".$contact."</span></h2></div>";
                    ?>
                    <div class="my-3 float-left">
                        <button type="button" id="edit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
                <div class="card-body" id="editform">
                    <div class='card '>
                        <p class="card-header text-center">
                            Update Prosnal detils
                        </p>
                        <div class='card-body'>
                            <form>
                                <div class="form-group">
                                    <lable for="age" class="label-control">Age</label>
                                    <input type="number" id="age" class="form-control" value="<?php if($age != '' || $age != 'N/A'){ echo $age;} ?>">
                                </div>
                                <div class="form-group">
                                    <lable for="dob" class="label-control">Date Of Birth</label>
                                    <input type="date" id="dob" class="form-control" value="<?php if($dob != '' || $dob != 'N/A'){ echo $dob;} ?>">
                                </div>
                                <div class="form-group">
                                    <lable for="contact" class="label-control">Contact Number</label>
                                    <input type="number" id="contact" class="form-control" value="<?php if($contact != '' || $contact != 'N/A'){ echo $contact;} ?>">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" id="upbutton">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4 float-right">
                <button type="button" id="logout" class="btn btn-danger">Logout</button>
            </div>
        </div>
        
    </div>
</body>
</html>