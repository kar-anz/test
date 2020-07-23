<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!DOCTYPE html>
<html>

	<head> 
	<meta charset="utf-8">
	<!--подключение css файла-->
	<link href="..my/css/style.css" rel="stylesheet" />
	</head>

	<body>
	<!--форма входа-->
	<form>
	<fieldset class="account-entry">
	    <label>
        <input type="text" name="login" placeholder="ЛОГИН" /><br>
		<input type="text" name="password" placeholder="ПАРОЛЬ" /><br>
        <input type="submit" id="check" value="Вход" />
	    </label>	
	    <p>У вас нет аккаунта? - <a href="..my/register.php">зарегистрируйтесь</a>!</p>
	</fieldset>	
	    <p class="msg none">...</p>
    </form>

    <!--подключение js файла-->	
	<script src="..my/js/jquery-3.4.1.min.js"></script>
    <script src="..my/js/script.js"></script>
    </body>
</html>