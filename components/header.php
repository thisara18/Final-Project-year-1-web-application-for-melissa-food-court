<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
    }
}
?>

<!--nav bar-->

 <nav class="navbar navbar-expand-lg bg-body-tertiary shadow fixed-top">
    <div class="container">
        <!--logo-->
        <a class="navbar-brand" href="#"><img src="asset/css/image/logo.png" alt="" class="logo"></a>
        <!--Toggle btn-->
        <button class="navbar-toggler shadow-none-border-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--side bar-->
        <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <!--side bar header-->
                <h5 class="offcanvas-title text-white border-bottom" id="offcanvasNavbarLabel">melissa's</h5>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!--side bar body-->
            <div class="offcanvas-body d-flex flex-column flex-lg-row">
                    <ul class="navbar-nav justify-content-center align-items-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item mx-2 ">
                            <a class="nav-link " href="#about">About</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#menu">Menu</a>
                        </li>
                    
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#reviews">Fetures</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#bolog">Gallery</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="reservation.php">Reservation</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="orders.php">My Orders</a>
                        </li>
                       
                    </ul>

                 <!--log in/sign up-->
                 <div class=" nav-log d-flex  flex-column  flex-lg-row gap-3 py-3 align-items-center justify-content-center text-center">
                        <?php
                        $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                        $count_cart_items->execute([$user_id]);
                        $total_cart_items = $count_cart_items->rowCount();
                        ?>
                        <a href="cart.php"><i class="ri-shopping-cart-fill "></i><span>(<?= $total_cart_items; ?>)</span></a>


                        <div class="profile">
                            <?php
                            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                            $select_profile->execute([$user_id]);
                            if ($select_profile->rowCount() > 0) {
                                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                            ?>
                                <p class="name">Hi <?= $fetch_profile['name']; ?></p>
                                <div class="flex">
                                    <a href="profile.php" class="btn1">profile</a>
                                    <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
                                </div>
                             
                            <?php
                            } else {
                            ?>
                                <p class="name"></p>
                                <a href="my.php" class="btn btn-brand">login</a>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>