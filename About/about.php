<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="asset/css/image/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Melissa's Food Court</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-black text-white">
    <!-- header section starts  -->
    <?php include 'components/user_header.php'; ?>
    <!-- header section ends -->
    <div class="container">
        <div class="row">
            <div class="heading  text-center pt-4 pb-5">
                <h1>Melissa's Food Court</h1>
            </div>

            <div class="col-lg-5 about-img justify-content-center align-items-center text-center ">
                <img src="about image.jpeg" alt="" style="width: 400px;">
            </div>

            <div class="col-lg-7 about-text">
                <div><i class=" icon ri-double-quotes-l"></i></div>
                <div class="p-3">
                    <p>Melissa's Food Court offers a unique dining experience with its diverse menu featuring Sri
                        Lankan, Italian, and Mexican cuisines. From traditional Sri Lankan delicacies to mouthwatering
                        Italian pizzas and flavorful Mexican dishes, Melissa caters to every palate.

                        The ambiance of Melissa is warm and inviting, with cozy seating arrangements and attentive staff
                        ensuring a memorable dining experience. Whether you're craving the spicy flavors of Sri Lankan
                        cuisine, the cheesy goodness of Italian pizzas, or the bold tastes of Mexican food, Melissa has
                        something for everyone.

                        What sets Melissa apart is not just its diverse menu, but also the impeccable quality of
                        ingredients and the passion for delivering exceptional flavors.

                        Whether you're dining with family, friends, or colleagues, Melissa's Food Court offers a
                        culinary adventure that will leave you coming back for more. Experience the best of Sri Lankan,
                        Italian, and Mexican cuisines all under one roof at Melissa's Food Court in Yakkala. Bon
                        appétit!
                    </p>
                    <div></div>
                </div>


            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="js/script.js"></script>
</body>

</html>