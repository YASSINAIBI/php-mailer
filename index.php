<?php session_start(); ?>

<?php include 'includes/header.php' ?>

<section class="header" style="position:relative">
    <div style="position:absolute" class="slider">
        <div class="swiper-container swiper-container-one">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="img/bg1.jpg"></div>
                <div class="swiper-slide"><img src="img/bg2.jpg"></div>
                <div class="swiper-slide"><img src="img/bg11.jpg"></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!--Navbar -->
        <?php include 'includes/navbar.php' ?>
    <!--/.Navbar -->

    <div class="header_content text-center container">
        <p>the best food in town at <br> one of the best location</p>
        <button class="btn btn-light">book the menu <br> of today</button>
    </div>
</section>

<section class="welcom_to container">
    <div class="row">
        <div class="col-md-6 left_side">
            <h1>welcome to <span class="fast_food">fast food</span></h1>
            <h6 class="mb-4">OUR LITTLE STORY</h6>

            <div class="text-center text">
                <p>In 1917, 15-year-old Ray Kroc lied about his age to join the Red Cross as an ambulance driver,
                    but the war ended before he completed his training. He then worked as a piano player, a paper
                    cup salesman and a Multimixer salesman. In 1954, he visited a restaurant in San Bernardino,
                    California that had purchased several Multimixers.</p>
                <img src="img/sign.png">
            </div>
        </div>
        <div class="col-md-6 right_side">
            <div>
                <img src="img/combine.png">
            </div>
        </div>
    </div>
</section>

<section class="quote text-center">
    <h4 class="container">
        " Cooking everything with respect will lead to amazing tasting experiences " <br>
        <span class="quote_creator">Rolf Baumann</span>
    </h4>
</section>

<section class="container day-menu">
    <div class="top-text text-center">
        <h1>TODAYS <span class="special">special</span></h1>
        <h2>MENU OF THE DAY</h2>
    </div>
    <div class="row">
        <div class="col-md-6 right-side">
            <!-- menu of today -->
            <?php

            $array_one = [];
            $array_two = [];

            $query = $db_handle->runQuery("SELECT * FROM plats");
            foreach ($query as $value) {
                if($value["id"] % 2 == 0) {
                    array_push($array_one, $value["id"]);
                }
                else {
                    array_push($array_two, $value["id"]);
                }
            }

            srand((int)date('ymd'));

            $first_plat = number_format($array_one[rand(0, count($array_one) - 1)]);
            $secound_plat = number_format($array_two[rand(0, count($array_two) - 1)]);

            $_SESSION["first_plat"] =  $first_plat;
            $_SESSION["secound_plat"] = $secound_plat;

            $query = $db_handle->runQuery("SELECT * FROM plats WHERE id IN($first_plat, $secound_plat)");
            foreach ($query as $value) {
            ?>
                <!-- Card -->
                <div class="card mb-5 mt-5">
                    <!-- Card content -->
                    <div class="card-body">
                        <img src="<?php echo $value["img"] ?>">
                        <h5><?php echo $value["category"] ?><br><span class="sub-title"><?php echo $value["name"] ?></span></h5>
                        <p>$ <?php echo $value["price"] ?></p>
                    </div>
                </div>
                <!-- Card -->
            <?php } ?>
        </div>
        <div class="col-md-6 left-side">
            <img src="img/menu.jpg" width="100%">
        </div>
    </div>
</section>

<section class="customer_reviews container">
    <div class="top-text text-center">
        <h1>CUSTOMER <span class="special">reviews</span></h1>
        <h2>WHAT THEY SAY</h2>
    </div>

    <div class="swiper-container swiper-container-two">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="flex_content">
                    <p>Lorem ipsum dolor sit amet consectetur, <br>adipisicing elit. Delectus qui odio eius sed! Quod laboriosam rerum.</p>
                    <img src="img/user1.jpg">
                    <h5>John Doe</h5>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="flex_content">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br> Repudiandae ipsa dignissimos quasi.</p>
                    <img src="img/user2.jpg">
                    <h5>Anna Aston</h5>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="flex_content">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. <br> Adipisci esse quidem nam, perspiciatis sequi.</p>
                    <img src="img/user3.jpg">
                    <h5>Maria Kate</h5>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="flex_content">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br> Esse, rem mollitia consectetur reiciendis.</p>
                    <img src="img/user1.jpg">
                    <h5>Anna Deynah</h5>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="flex_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Itaque sapiente illo, nostrum in.</p>
                    <img src="img/user2.jpg">
                    <h5>Maria Kate</h5>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="flex_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> A pariatur itaque ullam quo quam.</p>
                    <img src="img/user3.jpg">
                    <h5>Anna Aston</h5>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="book_table_now">
    <div class="container text-center">
        <h2>book a table now</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic eveniet enim eum! Asperiores accusantium unde error animi ipsam laudantium cumque fugiat est numquam, dolore aliquam pariatur accusamus! Explicabo, cupiditate impedit.</p>
        <button type="button" class="btn">MAKE A RESERVATION</button>
    </div>
</section>

<section class="contact">
    <div class="contact_text">
        <div class="row">
            <div class="col-md-2">
                <i class="far fa-envelope"></i>
            </div>
            <div class="col-md-10">
                <h5>Email</h5>
                <p>yourmail@dmain.com</p>
            </div>
        </div>
    </div>
    <div class="contact_text">
        <div class="row">
            <div class="col-md-2">
                <i class="far fa-envelope"></i>
            </div>
            <div class="col-md-10">
                <h5>Reservation</h5>
                <p>+01 123-456-4590</p>
            </div>
        </div>
    </div>
    <div class="contact_text">
        <div class="row">
            <div class="col-md-2">
                <i class="far fa-envelope"></i>
            </div>
            <div class="col-md-10">
                <h5>Location</h5>
                <p>124, Lorem Street, NY</p>
            </div>
        </div>
    </div>
</section>

<?php
    //note:returns 0 through 6 but as string so to check if monday do this:
    // $monday = "monday";
    // $tuesday = "tuesday";
    // $wednesday = "wednesday";
    // $thursday = "thursday";
    // $friday = "friday";
    // $saturday = "saturday";
    // $sunday = "sunday";

    // $dayNow = "";

    // if(date('w') == 0){
    //     $dayNow = "sunday";
    // }
    // if(date('w') == 1){
    //     $dayNow = "monday";
    // }
    // if(date('w') == 2){
    //     $dayNow = "tuesday";
    // }
    // if(date('w') == 3){
    //     $dayNow = "wednesday";
    // }
    // if(date('w') == 4){
    //     $dayNow = "thursday";
    // }
    // if(date('w') == 5){
    //     $dayNow = "friday";
    // }
    // if(date('w') == 6){
    //     $dayNow = "saturday";
    // }

    // echo $dayNow;

    // $array_one = array(1, 3, 5, 7, 9, 11, 13);
    // $array_two = array(2, 4, 6, 8, 10, 12, 14);

    // srand((int)date('ymd'));
    // echo number_format(rand(1, 14));

    // $first_array = [];
    // $secound_array = [];

    // $query = $db_handle->runQuery("SELECT * FROM plats");
    // foreach ($query as $value) {
    //     if($value["id"] % 2 == 0) {
    //         array_push($first_array, $value["id"]);
    //     }
    //     else {
    //         array_push($secound_array, $value["id"]);
    //     }
    // }
?>

<?php include 'includes/footer.php' ?>

<?php include 'includes/allscript.php' ?>