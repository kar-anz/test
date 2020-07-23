<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
   <link href="../my/css/style.css" rel="stylesheet" />
</head>
<body>

    <!--форма регистрации-->
	<form>
	<fieldset class="account-register">
	<label>
        <input type="text" name="name" placeholder="ИМЯ" /><br>
        <input type="text" name="login" placeholder="ЛОГИН" /><br>
		<input type="email" name="email" placeholder="EMAIL" /><br>
		<input type="text" name="passwordone" placeholder="ПАРОЛЬ" /><br>
		<input type="text" name="passwordtwo" placeholder="ПОВТОРИТЕ ПАРОЛЬ" /><br>
        <input type="submit" id="check1" value="Регистрация" />
	</label>
	</fieldset>	
	</form>
        <p>
            У вас уже есть аккаунт? - <a href="../my/index1.php">авторизируйтесь</a>!
        </p>
        <p class="msg none">...</p>
    </form>
	<script src="../my/js/jquery-3.4.1.min.js"></script>
    <script src="../my/js/script.js"></script>

</body>
</html>