<?php
$email = '';
$phone ='';
$pswd ='';
$check_pswd ='';
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['register']){
//    print_r($_POST);

    if (!empty($_POST['email'])){
        $email = trim(htmlspecialchars($_POST['email']));
    } else {
        echo "Введите имейл"."<br>";
    }

    if (!empty($_POST['phone'])) {
        $phone = trim(htmlspecialchars($_POST['phone']));
    } else {
        echo "Введите телефон"."<br>";
    }

    if (!empty($_POST['pswd'])){
        $pswd = trim(htmlspecialchars($_POST['pswd']));
    } else {
        echo "Введите пароль"."<br>";
    }

    if (!empty($_POST['check_pswd'])){
        $check_pswd = trim(htmlspecialchars($_POST['check_pswd']));
    } else {
        echo "Введите проверочный пароль"."<br>";
    }

    $reg_1 = '/([A-Za-z0-9_\.-]+)(@[A-Za-z]+)(\.[A-Za-z]{2,3})/';
    $reg_2 = '/^\+380[0-9]{9}$/';

    if (preg_match($reg_1, $email)) {
        echo "Введите email правильно";
    }

    if (!preg_match($reg_2, $phone)) {
        echo "Введите телефон правильно";
    }

    if ($pswd == $check_pswd) {
        echo "Редирект на личный кабинет. Вы зарегистрированы";
    } else {
        echo "Введите пароли правильно";
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
</head>
<body>
<form method="POST">
    <p>Email</p>
    <input title="Email" type="email" name="email">
    <p>Телефон</p>
    <input title="phone" type="tel" name="phone">
    <p>Пароль</p>
    <input title="password" type="password" name="password">
    <p>Введите пароль еще раз</p>
    <input title="confirm_password" type="password" name="check_password">
    </p>
    <input type="submit" name="register" value="submit">
</form>
</body>
</html>