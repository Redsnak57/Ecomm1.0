<?php

include '../components/connect.php';

session_start();

if(isset($_POST['submit'])){

   $username = $_POST['username'];
   $username = strip_tags($username);
   $password = sha1($_POST['password']);
//    $password = ($_POST['password']);
   $password = strip_tags($password);

   $select_admin = $bdd->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
   $select_admin->execute([$username, $password]);
   $row = $select_admin->fetch(PDO::FETCH_ASSOC);

   if($select_admin->rowCount() > 0){
      $_SESSION['admin_ID'] = $row['ID'];
      header('location:dashboard.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- font aweseome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '<div class="message">
                <span>'.$message.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>';
        }
    }

    ?>
    <!-- admin session starts -->

    <section class="form-container">
        <form action="" method="POST">
            <h3> Login</h3>
            <input type="text" name="username" maxlenght="20" placeholder="Nom de compte" class="box">
            <input type="password" name="password" maxlenght="20" placeholder="Mot de passe" class="box">
            <button type="submit" value="login now" name="submit" class="btn">Connection</button>
        </form>
    </section>
    <!-- admin session end -->


</body>
</html>