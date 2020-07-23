<?php

    session_start();
    require_once 'connect.php';

    $name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $passwordone = $_POST['passwordone'];
    $passwordtwo = $_POST['passwordtwo'];

    if ($passwordone === $passwordtwo) 
	{

        $passwordone = md5($passwordone);

        $dom = new DomDocument;

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
						$dom->createTextNode($passwordone));
		$email1->appendChild( 
						$dom->createTextNode($email));
		$name1->appendChild( 
						$dom->createTextNode($name));	

		$test1 = $dom->saveXML(); // передача строки в test1 
		$dom->save('../' .'test1.xml'); // сохранение файла 

				$_SESSION['message'] = 'Регистрация прошла успешно!';
				header('Location: ../index1.php');


    } 
	else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

?>
