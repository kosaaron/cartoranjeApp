/** login.js */


function loadLogin() {
    //checkDevice();

    // document.getElementById("btn_help").addEventListener("click", openHelp, false);
    document.getElementById("btn_login").addEventListener("click", checkForm, false);

}
window.onload = loadLogin;

$('#new_password_checkbox').change(function(){
    var x = document.getElementById("login_input_password");
    if (this.checked) {
        x.style.display = "none";
    }
    else {
        x.style.display = "block";
    }
});

function openHelp(){
    var x = document.getElementById("help_container");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById("btn_help").innerHTML='<i class="fas fa-times-circle"></i>';
    } else {
        x.style.display = "none";
        document.getElementById("btn_help").innerHTML='<i class="fas fa-question-circle"></i>';
    }
}
function checkForm(){

    var newpassword = document.getElementById("new_password_checkbox").checked;
    var email = document.getElementById("login_input_email").value;
    if (newpassword) {
        sendPasswordLink(email);
    }else{
        var password = document.getElementById("login_input_password").value;
        checkLogin(email, password);
    }

}
function sendPasswordLink(email) {
    $.ajax({
        type: "POST",
        url: "./php/SendChangeRequest.php",
        data: { 
            Email: email
        },
        success: function (data) {
            var x = document.getElementById('login_message_container')
            if(data['EmailSent']){
                x.innerHTML='<i class="fas fa-check-circle"></i><p>' + data['Message'] + '</p>';
                x.classList.add("toast-message-displayed");
                document.getElementById("login_input_email").value = "";
                setTimeout(function(){ x.classList.remove("toast-message-displayed"); }, 3000);
            }
            else{
                x.style.display= "block";
                x.innerHTML='<i class="fas fa-times-circle"></i><p>' + data['Message'] + '</p>';
                x.classList.add("toast-message-displayed");
                setTimeout(function(){ x.classList.remove("toast-message-displayed"); }, 3000);
            }
            
        },
        dataType: 'json'
    });
}
function checkLogin(email, password) {
    $.ajax({
        type: "POST",
        url: "./php/CheckLogin.php",
        data: { 
            Email: email,
            Password: password
        },
        success: function (data) {
            var x = document.getElementById('login_message_container')
            if(data['LoggedIn']){
                x.innerHTML='<i class="fas fa-check-circle"></i><p>' + data['Message'] + '</p>';
                x.classList.add("toast-message-displayed");
                setTimeout(function(){ x.classList.remove("toast-message-displayed"); }, 3000);
                window.location.replace("index.php");
            }
            else{
                x.style.display= "block";
                x.innerHTML='<i class="fas fa-times-circle"></i><p>' + data['Message'] + '</p>';
                x.classList.add("toast-message-displayed");
                setTimeout(function(){ x.classList.remove("toast-message-displayed"); }, 3000);
            }
            
        },
        dataType: 'json'
    });
}

// function checkDevice(){
//     var devicecode = localStorage.getItem("devicecode");
//     var id_dev = localStorage.getItem("id_dev");
//     var x = document.getElementById('login_message_container')
//     if(devicecode !== null){
//         $.ajax({
//             type: "POST",
//             url: "./php/DeviceCheck.php",
//             data: {
//                 Id: id_dev, 
//                 DeviceCode: devicecode
//             },
//             success: function (data) {
//                 console.log(data);
//                 if(data['VerifiedDevice']){
//                     x.innerHTML='<i class="fas fa-check-circle"></i><p>Továbbirányítjuk az Ön SSBS rendszerébe!</p>';
//                     x.classList.add("toast-message-displayed");
//                     window.location.replace("blured_mainpage.php");
//                     setTimeout(function(){ x.classList.remove("toast-message-displayed"); }, 3000);
//                 }
//                 else{
//                     x.innerHTML='<p class="text-center">Eszköz nincs regisztrálva! Kérjük adja meg email címét!</p><i class="fas fa-times-circle"></i>';
//                     x.classList.add("toast-message-displayed");
//                     setTimeout(function(){ x.classList.remove("toast-message-displayed"); }, 3000);
//                 }
                
//             },
//             dataType: 'json'
//         });  

//     }else{
//         x.innerHTML='<i class="fas fa-cogs"></i><p class="text-center">Eszköz nincs regisztrálva! Kérjük adja meg email címét!</p>';
//         x.classList.add("toast-message-displayed");
//         setTimeout(function(){ x.classList.remove("toast-message-displayed"); }, 3000);
//     }
// }