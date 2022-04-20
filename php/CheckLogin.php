<?php
session_start();

require_once('Connect.php');

$PDOConnect = new PDOConnect();
$pdo = $PDOConnect->pdo;

if ( !isset($_POST['Email'], $_POST['Password']) ) {
	// Could not get the data that should have been sent.
	die ('Something went wrong...');
}else{
    $email = $_POST['Email'];
    $password = $_POST['Password'];
}

/*Check email/password combination*/


// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $pdo->prepare(
	"SELECT 
        UserID,
        UserName,
        UserPassword
	 FROM users
	 WHERE Email = ?"
)) {
	$stmt->execute([$_POST['Email']]);
	$user = $stmt->fetch();
}

if ($user) {
	if (password_verify($_POST['Password'], $user['UserPassword'])) {
		$_SESSION['LoggedIn'] = TRUE;
		$_SESSION['Name'] = $user['UserName'];
		$_SESSION['UserId'] = $user['UserID'];
		$main_data['Message'] = 'Üdvözöljük ' . $_SESSION['Name'] . '!';
		$main_data['LoggedIn'] = TRUE;
	} else {
		$main_data['Message'] = 'Helytelen jelszó!';
		$main_data['LoggedIn'] = FALSE;
	}
} else {
	$main_data['Message'] = 'Helytelen felhasználó!';
	$main_data['LoggedIn'] = FALSE;
}
$json = json_encode($main_data);
print_r($json);


?>