<!DOCTYPE html>
<?php 
    require("connect.php");

    if(isset($_POST["submit"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $stm = $con->prepare("SELECT * FROM users WHERE username=:username");
        $stmt->bindParam(":username", $username);
        $stm->execute();
        $userExists = $stm->fetchAll();
        var_dump($userExists);

        $passwordHashed = $userExists[0]["password"];
        $checkPassword = password_verify($passsword, $passwordHashed);

        if($checkPassword === false){
            echo "Login fehlegetretten oder Passwort nicht richtig";
            

        }
        if($checkPassword ===true){

            session_start();
            $_SESSION["username"] = $userExists[0]["username"];
            
            header("Location: home.php");
        }

    }


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <form action="login.php" method="POST">
        <h1>Login</h1>
        <div class="input_con">
            <input type="text" placeholder="Benutzername" name="username" autocomplete="off">
            <input type="text" placeholder="Email" name="email" autocomplete="off">
            <input type="password" placeholder="Passwort" name="password" autocomplete="off">
        </div>
        <button name="submit">Login</button>
    </form>
</body>
</html>