<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Font Awesome CDN link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Custom CSS file link  -->
    <link rel="stylesheet" href="../css/admin_style.css">

    <style>
        /* Custom CSS for the professional dashboard */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #007bff;
            text-decoration: none;
        }

        .sidebar {
            width: 250px;
            background-color: #007bff;
            color: #fff;
            padding-top: 20px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }

        .sidebar .logo {
            font-size: 1.8rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav ul li {
            margin-bottom: 10px;
        }

        .sidebar-nav ul li a {
            display: block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .sidebar-nav ul li a:hover {
            background-color: #0056b3;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .heading {
            margin-top: 0;
            font-size: 2rem;
            color: #333;
        }

        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .box {
            flex: 1 1 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .box h3 {
            margin-top: 0;
            font-size: 1.5rem;
            color: #333;
        }

        .box p {
            margin-bottom: 20px;
            color: #666;
        }

        .box a.btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .box a.btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <!-- Header with Sidebar Navigation -->
    <header class="header">
        <a href="#" class="logo">Admin<span>Dashboard</span></a>
        <div class="profile">
            <span>Welcome, Admin</span>
            <a href="#" class="btn">Logout</a>
        </div>
    </header>

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <div class="logo">Admin<span>Panel</span></div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="products.php"><i class="fas fa-box"></i> Products</a></li>
                <li><a href="placed_orders.php"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                <li><a href="admin_accounts.php"><i class="fas fa-users-cog"></i> Admins</a></li>
                <li><a href="users_accounts.php"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="messages.php"><i class="fas fa-envelope"></i> Messages</a></li>
                <li><a href="re.php"><i class="fas fa-calendar"></i> Reservation</a></li>
                <li><a href="event.php"><i class="fas fa-calendar-alt"></i> Event Booking</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <div class="main-content">

        <!-- Admin Dashboard Section -->
        <section class="dashboard">
            <h1 class="heading">Dashboard</h1>
            <div class="box-container">
                

                    <div class="box">
                        <h3>Welcome!</h3>
                        <p><?= $fetch_profile['name']; ?></p>
                        <a href="update_profile.php" class="btn">update profile</a>
                    </div>

                    <div class="box">
                        <?php
                        $total_pendings = 0;
                        $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
                        $select_pendings->execute(['pending']);
                        while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
                            $total_pendings += $fetch_pendings['total_price'];
                        }
                        ?>
                        <h3><span>Rs </span><?= $total_pendings; ?><span>/-</span></h3>
                        <p>Total pendings</p>
                        <a href="placed_orders.php" class="btn">See orders</a>
                    </div>

                    <div class="box">
                        <?php
                        $total_completes = 0;
                        $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
                        $select_completes->execute(['completed']);
                        while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
                            $total_completes += $fetch_completes['total_price'];
                        }
                        ?>
                        <h3><span>Rs </span><?= $total_completes; ?><span>/-</span></h3>
                        <p>Total completes</p>
                        <a href="placed_orders.php" class="btn">see orders</a>
                    </div>

                    <div class="box">
                        <?php
                        $select_orders = $conn->prepare("SELECT * FROM `orders`");
                        $select_orders->execute();
                        $numbers_of_orders = $select_orders->rowCount();
                        ?>
                        <h3><?= $numbers_of_orders; ?></h3>
                        <p>Total orders</p>
                        <a href="placed_orders.php" class="btn">see orders</a>
                    </div>

                    <div class="box">
                        <?php
                        $select_products = $conn->prepare("SELECT * FROM `products`");
                        $select_products->execute();
                        $numbers_of_products = $select_products->rowCount();
                        ?>
                        <h3><?= $numbers_of_products; ?></h3>
                        <p>Products added</p>
                        <a href="products.php" class="btn">see products</a>
                    </div>

                    <div class="box">
                        <?php
                        $select_users = $conn->prepare("SELECT * FROM `users`");
                        $select_users->execute();
                        $numbers_of_users = $select_users->rowCount();
                        ?>
                        <h3><?= $numbers_of_users; ?></h3>
                        <p>Users accounts</p>
                        <a href="users_accounts.php" class="btn">see users</a>
                    </div>

                    <div class="box">
                        <?php
                        $select_admins = $conn->prepare("SELECT * FROM `admin`");
                        $select_admins->execute();
                        $numbers_of_admins = $select_admins->rowCount();
                        ?>
                        <h3><?= $numbers_of_admins; ?></h3>
                        <p>Admins</p>
                        <a href="admin_accounts.php" class="btn">see admins</a>
                    </div>

                    <div class="box">
                        <?php
                        $select_messages = $conn->prepare("SELECT * FROM `messages`");
                        $select_messages->execute();
                        $numbers_of_messages = $select_messages->rowCount();
                        ?>
                        <h3><?= $numbers_of_messages; ?></h3>
                        <p>New messages</p>
                        <a href="messages.php" class="btn">see messages</a>
                    </div>
                    <div class="box">
                        <?php
                        $select_messages = $conn->prepare("SELECT * FROM `reservation`");
                        $select_messages->execute();
                        $numbers_of_messages = $select_messages->rowCount();
                        ?>
                        <h3><?= $numbers_of_messages; ?></h3>
                        <p>New reservations</p>
                        <a href="re.php" class="btn">see reservations</a>
                    </div>
                    <div class="box">
                        <?php
                        $select_messages = $conn->prepare("SELECT * FROM `event`");
                        $select_messages->execute();
                        $numbers_of_messages = $select_messages->rowCount();
                        ?>
                        <h3><?= $numbers_of_messages; ?></h3>
                        <p>New Event Booking</p>
                        <a href="event.php" class="btn">see Event Booking</a>
                    </div>

        

            </div>

        </section>

        <!-- admin dashboard section ends -->





    </div>








<!-- Custom JS file link -->
  <script src="../js/admin_script.js"></script>

</body>

</html>