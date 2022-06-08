<?php

include '../components/connect.php';

session_start();

$admin_ID = $_SESSION['admin_ID'];
if(!isset($admin_ID)){
    header("location:admin_login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- font aweseome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

    <?php 
    include '../components/admin_header.php';
    ?>

    <!-- admin dasboard section start -->

    <section class="dashboard">

        <h1 class="heading">Dashboard</h1>
        
        <div class="box-container">
            <div class="box">
            <h3> Bienvenue </h3>
            <p><?= $fetch_profile["name"]; ?></p>
            <a href="update_profile.php" class="btn">Update profile</a>
            </div>

            <div class="box">
                <?php
                    $total_pendings = 0;
                    $select_pendings = $bdd->prepare("SELECT * FROM `order` WHERE payment_status = ?");
                    $select_pendings->execute(["pending"]);
                    while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                        $total_pendings += $fetch_pendings["total_price"];
                    }
                ?>
                <h3><span>€</span><?= $total_pendings ?><span>/-</span></h3>
                <p>Total pendings</p>
                <a href="placed_orders.php" class="btn"> See orders</a>
            </div>

            <div class="box">
                <?php
                    $total_completes = 0;
                    $select_completes = $bdd->prepare("SELECT * FROM `order` WHERE payment_status = ?");
                    $select_completes->execute(["completed"]);
                    while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
                        $total_completes += $fetch_completes["total_price"];
                    }
                ?>
                <h3><span>€</span><?= $total_completes ?><span>/-</span></h3>
                <p>Total completes</p>
                <a href="placed_orders.php" class="btn"> See orders</a>
            </div>

            <div class="box">
                <?php
                    $select_orders = $bdd->prepare("SELECT * FROM `orders`");
                    $select_orders->execute();
                    $numbers_of_orders = $select_orders->rowCount();
                ?>
                <h3><?= $numbers_of_orders; ?></h3>
                <p>Total orders</p>
                <a href="placed_orders.php" class="btn">See orders</a>
            </div>

            <div class="box">
                <?php
                    $select_products = $bdd->prepare("SELECT * FROM `products`");
                    $select_products->execute();
                    $numbers_of_products = $select_products->rowCount();
                ?>
                <h3><?= $numbers_of_products; ?></h3>
                <p>products added</p>
                <a href="products.php" class="btn">See products</a>
            </div>

            <div class="box">
                <?php
                    $select_users = $bdd->prepare("SELECT * FROM `users`");
                    $select_users->execute();
                    $numbers_of_users = $select_users->rowCount();
                ?>
                <h3><?= $numbers_of_users; ?></h3>
                <p> Users accounts</p>
                <a href="users_account.php" class="btn">See users</a>
            </div>

            <div class="box">
                <?php
                    $select_admin = $bdd->prepare("SELECT * FROM `admin`");
                    $select_admin->execute();
                    $numbers_of_admin = $select_admin->rowCount();
                ?>
                <h3><?= $numbers_of_admin; ?></h3>
                <p>  admin</p>
                <a href="admin_accounts.php" class="btn">See admin</a>
            </div>

            <div class="box">
                <?php
                    $select_messages = $bdd->prepare("SELECT * FROM `messages`");
                    $select_messages->execute();
                    $numbers_of_messages = $select_messages->rowCount();
                ?>
                <h3><?= $numbers_of_messages; ?></h3>
                <p> New messages</p>
                <a href="messages.php" class="btn">See message</a>
            </div>
        </div>
    </section>
    <!-- admin dasboard section end -->



<!-- custom js file link -->
<script src="../js/admin_script.js"></script>


</body>
</html>