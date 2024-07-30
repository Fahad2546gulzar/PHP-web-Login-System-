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

    .container {
      height: 313px;
      width: 359px;
      border: 0.3px black solid;
      border-radius: 20px;
      margin: auto;
      margin-top: 80px;
      background-color: #cde3ff;
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

    #pass {
      height: 50px;
    }

    #name,
    #pass {
      border-radius: 10px;
      border: 0.2px solid black;
      font-size: 20px;
      width: 322px;
      margin: auto;
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

    <form action="login.php" method="post" id="form">
      <label for="name">Name :</label>
      <input type="text" id="name" name="name">
      <label for="pass">Password :</label>
      <input type="text" id="pass" name="pass">
      <button id="button" type="submit">Submit</button>
    </form>
    <?php
    $login=false;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $name = $_POST['name'];
      $pass = $_POST['pass'];
      $con = mysqli_connect('127.0.0.1', "root", "", "users");
      $sql = "SELECT * FROM `data` WHERE `name`='$name'";
      $result = mysqli_query($con, $sql);
     
      $rows = mysqli_num_rows($result);
      if ($rows >= 1) {
        while($row=mysqli_fetch_assoc($result)){
        if(password_verify($pass,$row['pass'])){
          $login=true;
        }  
        }
        if($login==true){
          session_start();
          $_SESSION['name'] = $name;
          $_SESSION['pass'] = $pass;

        }

        if (isset($_SESSION['name']) && isset($_SESSION['pass'])) {
          header("location:welcome.php");
        }
      } else {
        echo "Invalid credentials";
      }
    }
    ?>
  </div>
</body>

</html>