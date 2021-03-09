$(document).ready(function () {
    //new user
    $("#cabutton").click(function () {
        const name = $('#name').val();
        const email = $('#email').val();
        const user = $('#user').val();
        const npass = $('#npass').val();
        const cpass = $('#cpass').val();   
        if (name == '') {
            $('#namereq').removeClass("invalid-feedback");
        } else {
            $('#namereq').addClass("invalid-feedback");
        }
        if (email == '') {
            $('#emailreq').removeClass("invalid-feedback");
        } else {
            $('#emailreq').addClass("invalid-feedback");
        }
        if (user == '') {
            $('#userreq').removeClass("invalid-feedback");
        } else {
            $('#userreq').addClass("invalid-feedback");
        }
        if (npass == '') {
            $('#npassw').removeClass("invalid-feedback");
        } else {
            $('#npassw').addClass("invalid-feedback");
        }
        if (cpass == '') {
            $('#cpassw').removeClass("invalid-feedback");
        } else if (cpass != '') {
            $('#cpassw').addClass("invalid-feedback");
        }
        if (npass == cpass) {
            $('#pasnotmatch').addClass("invalid-feedback");
        } else if (npass != cpass && cpass != '') {
            $('#pasnotmatch').removeClass("invalid-feedback"); 
        }
        if (name != '' && user != '' && npass != '' && cpass != '' && email != '' && npass == cpass) {
           
            $.ajax({
                type:"POST",
                url: "new_user.php",
                data: { name: name, email:email, username: user, npassword: npass, cpassword: cpass },
                success: function (data) {
                    if (data == "false") {
                        $("#userex").removeClass("invalid-feedback");
                    }
                    else if(data == "true"){
                        $("#userex").addClass("invalid-feedback");
                        window.location = "index.html";
                    }
                }
            });
            
        }
    });
    //existing user
    $("#lobutton").click(function () {
        const username = $("#euser").val();
        const password = $("#epass").val();
        if (username == '') {
            $('#euserreq').removeClass("invalid-feedback");
        } else {
            $('#euserreq').addClass("invalid-feedback");
        }
        if (password == '') {
            $('#epassreq').removeClass("invalid-feedback");
        } else {
            $('#epassreq').addClass("invalid-feedback");
        }
        if (username != '' && password != '') {
            $.ajax({
                type:"POST",
                url: "existing_user.php",
                data: { username: username, password: password},
                success: function (data) {
                    if (data == "false") {
                        $("#invalidpas").removeClass("invalid-feedback");
                    } else if (data == "true") {
                        window.location = "profile.php";
                    }
                }
            });
        }  
    });
    $("#logout").click(function () {
        window.location = "logout.php";
    });
});

