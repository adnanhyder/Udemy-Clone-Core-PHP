$(document).ready(function () {
    //email verification
    $("#stuemail").on("keypress blur", function () {
        var reg = /^[A-Z0-9_%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: "student/addstudent.php",
            method: "POST",
            data: {
                checkemail: "checkemail",
                stuemail: stuemail,
            },
            success: function (data) {
                //console.log(data);
                if (data != 0) {
                    $("#statusMsg2").html(
                        '<small style="color:red;">Email Already Exist</small>'
                    );
                    $("#signup").attr("disabled", true);
                } else if (data == 0 && reg.test(stuemail)) {
                    $("#statusMsg2").html(
                        '<small style="color:green;">New Email</small>'
                    );
                    $("#signup").attr("disabled", false);
                }
            },
        });
    });
});

function addStu() {
    var reg = /^[A-Z0-9_%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    //checking validation
    if (stuname.trim() == "") {
        $("#statusMsg1").html(
            '<small style="color:red;">Please Enter Name</small>'
        );
        $("#stuname").focus();
        return false;
    } else if (stuemail.trim() == "") {
        $("#statusMsg2").html(
            '<small style="color:red;">Please Enter Email</small>'
        );
        $("#stuemail").focus();
        return false;
    } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#statusMsg2").html(
            "<small style='color:red'>Please Enter Valid Email e.g. example@gmail.com</small>"
        );
        $("#stuemail").focus();
        return false;
    } else if (stupass.trim() == "") {
        $("#statusMsg3").html(
            '<small style="color:red;">Please Enter Password</small>'
        );
        $("#stupass").focus();
        return false;
    } else {
        $.ajax({
            url: "student/addstudent.php",
            method: "POST",
            dataType: "json",
            data: {
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
            },
            success: function (data) {
                console.log(data);
                if (data == "OK") {
                    $("#successMsg").html(
                        "<div class='spinner-border text-success' role='status'></div>"
                    );
                    clearStuRegField();
                    setTimeout(() => {
                        window.location.href = "index.php";
                    }, 1000);
                } else if (data == "Failed") {
                    $("#successMsg").html(
                        "<span class='alert alert-danger'>Unable to Registartion</span>"
                    );
                }
            },
        });
    }
}
//Empty All Field
function clearStuRegField() {
    $("#stuRegForm").trigger("reset");
    $("statusMsg1").html("");
    $("statusMsg2").html("");
    $("statusMsg3").html("");
}

//LOG IN VERIFICATION FOR USER
function checkStuLogin() {
    var stuLogeEmail = $("#stuLogemail").val();
    var stuLogPass = $("#stuLogpass").val();

    $.ajax({
        url: "student/addstudent.php",
        method: "POST",
        data: {
            stuLogEmail: stuLogeEmail,
            stuLogPass: stuLogPass,
        },
        success: function (data) {
            if (data == 0) {
                $("#statusLogMsg").html(
                    '<small class="alert alert-danger">Invalid Email or Password</small>'
                );
            } else if (data == 1) {
                $("#statusLogMsg").html(
                    '<div class="spinner-border text-success" role="status"></div>'
                );
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 1000);
            }
        },
    });
} 