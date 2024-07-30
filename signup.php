<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav {
            background-color: blue;
            height: 35px;
            border-radius: 20px;
            display: flex;
            column-gap: 23px;


        }

        .a {
            color: white;
            font-size: 25px;
            font-weight: 600;
            font-family: arial, serif;
            margin-left: 10px;
            margin: auto;
            text-decoration: none;
        }


        #form {
            display: flex;
            flex-direction: column;
            row-gap: 15px;
            margin-top: 20px;
        }

        #button {
            background-color: red;
            color: white;
            border: 0.2px solid black;
            border-radius: 10px;
            height: 37px;
            width: 100px;
            font-size: 20px;
            font-weight: 600;
            margin: auto;
            margin-top: 20px;
        }

        #name {
            height: 50px;
        }

        #pass,
        #cpass {
            height: 50px;
        }

        #name,
        #pass,
        #cpass {
            border-radius: 10px;
            border: 0.2px solid black;
            font-size: 20px;
            width: 1139px;
            margin: auto;
            margin-left: 20px;
        }

        label {
            font-size: 20px;
            font-weight: 700;
            margin-left: 20px;
        }

        body {
            background-color: #e5c991;
        }
    </style>
</head>

<body>
    <nav>
        <a class="a" href="login.php">Login</a>
        <a class="a" href="signup.php">Signup</a>
        <a class="a" href="welcome.php">Home</a>
    </nav>
    <div class="container">

        <form action="signup.php" method="post" id="form">
            <label for="name">Name :</label>
            <input type="text" id="name" name="name" required>
            <label for="pass">Password :</label>
            <input type="text" id="pass" name="pass" required>
            <label for="cpass">Confirm password :</label>
            <input type="text" id="cpass" name="cpass" required>
            <button id="button" type="submit">Submit</button>
        </form>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['name'];
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];
            $mpass=password_hash($pass,PASSWORD_DEFAULT);
            if ($pass == $cpass) {
                $con = mysqli_connect('127.0.0.1', "root", "", "users");
                $sql = "INSERT INTO `data` (`name`, `pass`, `date`) VALUES ( '$name', '$mpass', current_timestamp());";
                $result = mysqli_query($con, $sql);
            } else {
                echo "Plaese make sure password and confirm passwrd is same";
            }
        }
        ?>
    </div>
</body>

</html>