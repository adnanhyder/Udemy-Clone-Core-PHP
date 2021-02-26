//LOG IN ADMIN VERIFICATION FOR USER
function checkAdminLogin() {
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();

    $.ajax({
        url: "Admin/admin.php",
        method: "POST",
        data: {
            adminLogEmail: adminLogEmail,
            adminLogPass: adminLogPass,
        },
        success: function (data) {
            if (data == 0) {
                $("#statusAdminLogMsg").html(
                    '<small class="alert alert-danger">Invalid Email or Password</small>'
                );
            } else if (data == 1) {
                $("#statusAdminLogMsg").html(
                    '<div class="spinner-border text-success" role="status"></div>'
                    //'<small class="alert alert-success">Success Login...</small>'
                );
                setTimeout(() => {
                    window.location.href = "Admin/admindashboard.php";
                }, 1000);
            }
        },
    });
} 