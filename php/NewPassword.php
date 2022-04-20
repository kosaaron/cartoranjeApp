<?php
require_once('Connect.php');

$PDOConnect = new PDOConnect();
$pdo = $PDOConnect->pdo;

if ( !isset($_POST['Password'], $_POST['UserId']) ) {
	// Could not get the data that should have been sent.
	die ('Something went wrong...');
}else{
    $password = $_POST['Password'];
    $userid = $_POST['UserId'];
}
/*Set new password*/
$password_encrypted = password_hash($password,  PASSWORD_DEFAULT);
$query = "UPDATE users SET UserPassword = :UserPassword, UserActCode=NULL
                        WHERE UserID = :UserId";
$update = $pdo->prepare($query);
$update->execute(
    array(
        ':UserPassword'         =>  $password_encrypted,
        ':UserId'	=>	$userid
    )
);


$query = "SELECT UserName, Email FROM users WHERE UserID = :UserId";
$resultSet = $pdo->prepare($query);
$resultSet->execute(
    array(
        ':UserId'	=>	$userid
    )
);

foreach ($resultSet as $result) {
    $userFName = $result['UserName'];
    $userEmail = $result['Email'];
}

$main_data = array();
$main_data["success"] = 'S';
// $main_data["id_dev"] = $id_dev;
// $main_data["devicecode"] = $device_hash;
$main_data["userId"] = $userid;
$main_data["email"] = $userEmail;

$_SESSION['LoggedIn'] = TRUE;
$_SESSION['Name'] = $userFName;
$_SESSION['UserId'] = $userid;

$json = json_encode($main_data);
print_r($json);


?>