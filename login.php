<?php

session_start();

$autenticableUsers = array(

    [
        //burada üç farklı yetki seviyesinde kullanıcı belirliyoruz. 
        "username" => "yunus",
        "password" => "123",
        "is_admin" => true,
        "is_editor" => null,
    ],
    [
        "username" => "bora",
        "password" => "456",
        "is_admin" => false,
        "is_editor" => true,
    ],
    [
        "username" => "erhan",
        "password" => "789",
        "is_admin" => false,
        "is_editor" => false,
    ]

    );

foreach ($autenticableUsers as $key => $value) {
    if($_POST['username'] == $value['username'] && $_POST['password'] == $value['password']) {

        //burada girdiğimiz username listeden biriyle eşleşiyor mu ona bakıyoruz.
        $_SESSION['user'] = $value['username'];
        $_SESSION['is_admin'] = $value['is_admin'];
        $_SESSION['is_editor'] = $value['is_editor'];
        break;
    }
}

header("Location: index.php");
die();