<?php

session_start(); 
/*
// функция добавления записи d документ
function add($login, $password, $email, $name) {

$dom = new DomDocument;
$dom->Load('test1.xml');

//добавление корня - <id> 
$id = $dom->appendChild($dom->createElement('id')); 
 
//добавление элементов в <id> 
$login1 = $id->appendChild($dom->createElement('login'));
$password1 = $id->appendChild($dom->createElement('password'));
$email1 = $id->appendChild($dom->createElement('email')); 
$name1 = $id->appendChild($dom->createElement('name'));
 
// добавление текста 
$login1->appendChild( 
                $dom->createTextNode($login)); //доб текста
$password1->appendChild( 
                $dom->createTextNode($password));
$email1->appendChild( 
                $dom->createTextNode($email));
$name1->appendChild( 
                $dom->createTextNode($name));	

$test1 = $dom->saveXML(); // передача строки в test1 
$dom->save('test1.xml'); // сохранение файла 
echo "done add!";

}

//функция проверки уникальности
function check($login, $email){
$dom = new DomDocument;
$dom->Load('test1.xml');
$a= 0;

$login1= new SimpleXMLElement($xmlstr);
$email1= new SimpleXMLElement($xmlstr);
//проверяет логин 
if ((string) $login1-> id -> login == $login){
echo " этот логин занят";
++$a;
goto end;
}
//проверяет емаил
if ((string) $email1-> id -> email == $email){
echo " этот email занят";
++$a;
goto end;
}
return $a;
echo "done check!";

end:
return $a;
}
//функция шифрирования пароля
function coding($password){

$pass= (md5($password));
echo " пароль шифр.";
return $pass;
}*/

//проверка совпадения паролей
function comparison($password, $passwordtwo){
$a=0;
 if ($password!=$passwordtwo)
    {
	 echo "Пароли не совподают";
	 ++$a; 
     }
 return $a; 
}

//писк логина и пароля
function search($login_en)
{
$dom = new DomDocument;
$dom->Load('test1.xml');
$a= 0;

$login_en1= new SimpleXMLElement($xmlstr);
//проверяет логин 
if ((string) $login_en1-> id -> login == $login_en){
echo " такого логина нет";
++$a;
}

return $a;
}

//Проверка на заполненость полей
function empty1($login, $password,$passwordtwo, $email, $name){
$a=0;	
if (empty($_POST['login']) or  empty($_POST['passwordone']) or empty($_POST['passwordtwo']) or empty($_POST['email']) or empty($_POST['name'])){
echo "Не все поля заполнены";
++$a;}
return $a;
}

//кнопка вход
if( isset( $_POST['check'] ) )
{
    if (empty($_POST['login_en']or  empty($_POST['password_en'])) ) echo "Не все поля заполнены";
	else{
		$a=search($login_en);
	}
}
	
//кнопка регистрация
if( isset( $_POST['check1'] ) )
    {
		$a=empty1($login, $passwordone,$passwordtwo, $email, $name);
		
		if ($a==0) 
		{
			$b=comparison($passwordone, $passwordtwo);
			if ($b==0) echo 'Кнопка нажата!';
		}
    }

if (isset($_POST["name"]) && isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"])  ) { 

	// Формируем массив для JSON ответа
    $result = array(
    	'name' => $_POST["name"],
		'login' => $_POST["login"],
    	'email' => $_POST["email"],
		'passwordone' => $_POST["passwordone"],
    ); 

    // Переводим массив в JSON
    echo json_encode($result); 
}
?>

<!DOCTYPE html>
<html>

	<head> 
	<meta charset="utf-8">
	<!--подключение css файла-->
	<link href="../wp-content/themes/your_theme/my/css/style.css" rel="stylesheet" />
	</head>

	<body>
	<!--форма входа-->
	<form method="post" id="entry" action="">
	<fieldset class="account-entry">
	 <label>
        <input type="text" name="login_en" placeholder="ЛОГИН" /><br>
		<input type="text" name="password_en" placeholder="ПАРОЛЬ" /><br>
        <input type="button" id="check" value="Вход" />
	</label>	
	</fieldset>	
    </form>
	<!--форма регистрации-->
	<form method="post" id="register" action="">
	<fieldset class="account-register">
	<label>
        <input type="text" name="name" placeholder="ИМЯ" /><br>
        <input type="text" name="login" placeholder="ЛОГИН" /><br>
		<input type="email" name="email" placeholder="EMAIL" /><br>
		<input type="text" name="passwordone" placeholder="ПАРОЛЬ" /><br>
		<input type="text" name="passwordtwo" placeholder="ПОВТОРИТЕ ПАРОЛЬ" /><br>
        <input type="button" id="check1" value="Регистрация" />
	</label>
	</fieldset>	
	</form>
    
	
	<div id="result_form"></div>
    <!--подключение js файла-->	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../wp-content/themes/your_theme/my/js/script.js"></script>
    </body>
</html>