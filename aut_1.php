<?php
session_start();
include ("connect.php");

function Login( $login, $grants, $remember) {
        
    $_SESSION['login'] = $login;
    $_SESSION['grants'] = $grants;

    if ($remember) {
        setcookie('login', $login, time()+3600*24);
        setcookie('grants', $grants, time()+3600*24);
    }

    return true;
}


$enter_site = false;

$login = $_POST['login'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, $query  = "SELECT * FROM users WHERE login = '$login' AND password = '$password';" );
if(mysqli_num_rows ($check_user) > 0){
    

} else {
    $_SESSION ['message'] = 'Неверный логин или пароль';
   header ( 'Location: aut.php');
   exit;
}

$result = mysqli_query($connect, $query  = "SELECT grants FROM users WHERE login = '$login' AND password = '$password';" );

$row=mysqli_fetch_array($result);
    
$grants = $row[0];

$enter_site = Login( $login, $grants, $remember);


$result = mysqli_query($connect, $query  = "SELECT id FROM users WHERE login = '$login' AND password = '$password';" );

$row=mysqli_fetch_array($result);
    
$id = $row[0];
    
    if ($enter_site) {
        
        mysqli_query($connect, "INSERT INTO posecheniya (id_users) VALUES ('$id'); " );
        header('Location: ./menu.php');
        exit();
    }


