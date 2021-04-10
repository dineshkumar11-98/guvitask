<html lang="en">
	<meta name="viewport" content="width=device-width, inital-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration form</title>
    <link href="https://bootswatch.com/4/materia/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="dataprocess.js"></script>
    <script src="profileprocess.js"></script>
<body>
	<div class="continer">
        <div class="col-md-5 mx-auto my-5">
            <div class="card">
                <p class="card-header text-center">
                    Personal Details
                </p>
                <div class='card-body'>
                        <h2>Name: <span id="name" class='lead'></span></h2>
                        <h2>User-Name: <span id="username" class='lead'></span></h2>
                        <h2>E-Mail: <span id="email" class='lead'></span></h2>
                        <div id='pdata'>
                            <h2>Age: <span id="dage" class='lead'></span></h2>
                            <h2>D.O.B: <span id="ddob" class='lead'></span></h2>
                            <h2>Contact: <span id="dcontact" class='lead'></span></h2>
                        </div>
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
                                    <label for="age" class="label-control">Age</label>
                                    <input type="number" id="age" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="dob" class="label-control">Date Of Birth</label>
                                    <input type="date" id="dob" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="contact" class="label-control">Contact Number</label>
                                    <input type="number" id="contact" class="form-control" >
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