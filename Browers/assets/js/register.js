$(document).ready(function(){
    $("#register").submit(function(e){
        e.preventDefault();
        email = $("#txtEmail").val();
        console.log(email);
        SaveAndCheck();
        if(checked == "empty"){
            $("#notify").text("Mời nhập mật khẩu");
        }else if(checked == "different"){
            $("#notify").text("Mật khẩu nhập lại không giống");
        }else{
            // $("#notify").text("Mật khẩu nhập lại giống");
            $.ajax({
                url: "./controllers/processRegister.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    if(data=='existEmail')
                    {
                        $("#notify").html("<p class='text-danger'>Email đã tồn tại</p>");
                    }
                    else if(data=='success')
                    {
                        SendEmail($("#txtEmail").val());
                        $("#notify").html("<p class='text-danger'>Bạn đã đăng kí thành công</p>");
                    }
                }        
            });
        }
    });
});
var pass1 = "",pass2 = "",checked,sendEmail="";
var email;
function SaveAndCheck(){
    // if(!$("#txtpass1").empty()){
    // }
    pass1 = $("#txtpass1").val();
    // if(!$("#txtpass2").empty()){
    // }
    pass2 = $("#txtpass2").val();
    if(pass1 == pass2 && pass1 == ""){
        checked = "empty";
    }else if(pass1 != pass2){
        checked = "different";
    }else{
        checked = "ok";
    }
}

function SendEmail(email){
    $.ajax({
        url: "./controllers/sendEmailv1/index.php",
        type: "GET",
        data:  {"email": email}
    });
}