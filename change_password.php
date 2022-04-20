<?php
if(!(isset($_GET['act_code']))){
     die("Something went wrong... :(");
}
require_once('php/Connect.php');

$PDOConnect = new PDOConnect();
$pdo = $PDOConnect->pdo;

$act_code = $_GET['act_code'];

$query = "SELECT
            UserID,
            UserName,
            Email
          FROM users
            WHERE userActCode = :ActivationCode";
            
$resultSet = $pdo->prepare($query);
$resultSet->execute(
    array(
		':ActivationCode'	=>	$act_code
	)    
);

$no_of_row = $resultSet->rowCount();

if(!($no_of_row == 1)){
    echo $no_of_row;
    die("Invalid validation or already validated device");
}else{
    foreach($resultSet as $result){
        $userId = $result['UserID'];
    }
    echo '<script>localStorage.setItem("UserId", '.  $userId . ')</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SSB System</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
        integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
    <!-- <link rel="icon" href="images/favicon.ico" type="image/x-icon"> - Ádám: kell ikon-->
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <!-- <div class="dnmcppp-container display-flex flex-column login-popup">
        <div class="dnmcppp-header">Jelszó létrehozása</div>
        <div class="dnmcppp-content flex-1 password-popup-content">
            <div class="new-password-form-container">
                    <div class="password-form">
                        <i class="fas fa-user-circle profile-picture profile-picture-dark"></i>
                        <h3 id="username"></h3>
                        <input value="" type="password" name="new_password1" id="new_password1" class="form-control newpassword-formcontrol" placeholder="Jelszó" required autofocus></input>
                        <input value="" type="password" name="new_password1" id="new_password2" class="form-control newpassword-formcontrol" placeholder="Jelszó ismét" required></input>
                    </div>
            </div>
        </div>
        <div class="dnmcppp-footer">
            <div id="btn_create_password" class="save-btn-1 btn btn-sm">
                létrehoz
            </div>
        </div>
    </div>
    <div id="password_message" class="toast-message">
            
    </div> -->
    <div class="login_page_container">
        <div class="login-form">
            <i class="fas fa-user-circle profile-picture"></i>
            <!-- <h3 id="username"></h3> -->
            <input value="" type="password" name="new_password1" id="new_password1" class="form-control newpassword-formcontrol" placeholder="Jelszó" required autofocus></input>
            <input value="" type="password" name="new_password1" id="new_password2" class="form-control newpassword-formcontrol" placeholder="Jelszó ismét" required></input>
            <button id="btn_create_password" class="btn btn-outline-light">Módosít</button>
        </div>
        <div class="footer">
            <p class="copyright">© 2019 SSB System</p>
        </div>
        <div id="password_message" class="toast-message">
            
        </div>
    </div>
    <script src="js/new_password.js"></script>
</body>

</html>



