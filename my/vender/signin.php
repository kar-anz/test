<?php

session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];

$error_fields = [];

if ($login === '') {
    $error_fields[] = 'login';
}

if ($password === '') {
    $error_fields[] = 'password';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

$password = md5($password);

		function check($login, $password){
		$dom = new DomDocument;
		$a= 0;

		$login= new SimpleXMLElement($xmlstr);
		$password= new SimpleXMLElement($xmlstr);
		//проверяет логин 
		if ((string) $login-> id -> login == $login){
		echo " этот логин занят";
		++$a;
		}
		//проверяет пароль
		if ((string) $password-> id -> password == $password){
		echo " этот email занят";
		++$a;
		}
		return $a;
		}
		
    $check_user = check($login, $password);
	
    if ($check_user == 0) {

    $_SESSION['user'] = [
        "name" => $user['name'],
        "email" => $user['email']
    ];

    $response = [
        "status" => true
    ];

    echo json_encode($response);

} else {

    $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль'
    ];

    echo json_encode($response);
}
?>
