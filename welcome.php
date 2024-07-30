<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="welcome.php" method="post">
        <button type="submit">Logout</button>
    </form>
    <?php
    session_start();
        if(isset($_SESSION['name'])){
            echo "fahad";
        }else{
            header("location:login.php");
        }
        if($_SERVER['REQUEST_METHOD']=="POST"){
            session_destroy();
            header('location:login.php');
        }
    ?>
</body>
</html>