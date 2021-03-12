<?php include 'includes/header.php' ?>

    <!--Navbar -->
    <section class="header" style="position:relative; background-color: #A4C639;">
        <?php include 'includes/navbar.php' ?>
    </section>
    <!--/.Navbar -->

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
            ?>

            <?php if(!empty($errors)) { ?>
              <?php foreach($errors as $error) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <?php echo $error ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } ?>
            <?php } ?>

            <?php
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
    <button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#orangeModalSubscription">Order Now</button>
</section>

<div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Order form</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <form method="POST" action="reservation.php">
        <div class="modal-body">
          <div class="md-form mb-5">
            <i class="fas fa-user prefix grey-text"></i>
            <input type="text" id="form3" class="form-control validate" name="first_name" placeholder="first_name">
          </div>

          <div class="md-form">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="text" id="form2" class="form-control validate" name="last_name" placeholder="last_name">
          </div>

          <div class="md-form">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="text" id="form4" class="form-control validate" name="phone_number" placeholder="phone_number">
          </div>

          <div class="md-form">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="text" id="form5" class="form-control validate" name="place" placeholder="place">
          </div>
        </div>

      <!--Footer-->
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-outline-warning waves-effect" name="make_order">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
        </div>
      </form>
    </div>
    <!--/.Content-->
  </div>
</div>

<?php include 'includes/footer.php' ?>

<?php include 'includes/allscript.php' ?>

