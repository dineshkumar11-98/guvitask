$(document).ready(function(){
    $.ajax({
        type:"POST",
        url:"pdata.php",
        dataType:"JSON",
        success: function(data){
            if(data['age'] == '' && data['dob'] == '' && data['contact'] == ''){
                $("#dage").html("N/A")
                $("#ddob").html("N/A")
                $("#dcontact").html("N/A")
            } else {
                $("#dage").html(data['age'])
                $("#ddob").html(data['dob'])
                $("#dcontact").html(data['contact'])
                $("#age").val(data['age'])
                $("#dob").val(data['dob'])
                $("#contact").val(data['contact'])
            }
        }
    })
})