
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

<header class="header">
    <section class="flex">
    <a href="dashboard.php" class="logo">Admin <span> Panel </span></a>

    <nav class="navbar">
        <a href="dashboard.php"> Home </a>
        <a href="products.php"> Produits </a>
        <a href="placed_orders.php"> Orders </a>
        <a href="admins_accounts.php"> Admin </a>
        <a href="users_accounts.php"> Users </a>
        <a href="messages.php"> Messages </a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user"></div>
    </div>

    <div class="profile">
        <?php
            $select_profile = $bdd->prepare("SELECT * FROM `admin` WHERE ID= ?");
            $select_profile->execute([$admin_ID]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        ?>
        <p><?php echo $fetch_profile["name"]; ?></p>
        <a href="update_profil.php" class="btn">Update profile</a>
        <div class="flex-btn">
            <a href="admin_login.php" class="option-btn"> Login</a>
            <a href="admin_register.php" class="option-btn"> Register</a>
        </div>
        <a href="../components/admin_logout.php" class="delete-btn"> Logout</a>
    </div>


    </section>
</header>