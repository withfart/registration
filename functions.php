<?php


function get_user_by_email($email)
{

    require "connectionDataBase.php";
    $sql = ("SELECT * FROM users WHERE email = :email");
    $statement = $pdo->execute($sql);
    $statement->execute(["email" => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;

}


function add_user($email, $password)
{
    require "connectionDataBase.php";

    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        [
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]
    );

}

function set_flesh_message($type, $message)
{
    $_SESSION[$type] = $message;
}
function display_flesh_message($type)
{
    if (isset($_SESSION[$type])) {
        echo "<div class=\"alert alert-{$type} text-dark\" role=\"alert\">{$_SESSION[$type]}</div>";
        unset($_SESSION[$type]);
    }
}


function redirect_to($path)
{
    header('Location:' . $path);
}