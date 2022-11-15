<?php
require_once 'Controllers/UserRegistrationController.php';

$controller = new UserRegistrationController();

if(isset($_POST['btn'])){
    $controller->saveUser($_POST);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
  <div class="container">
    <div class="row" style="margin-top: 80px;margin-left: 250px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i><h2 style="text-align: center;">User Registration</h2></i>
                    <?php if(isset($_GET['msg'])) { ?>

                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Congratulations!</h4>
                        <p><?php  echo $_GET['msg']; ?></p>
                    </div>

                <?php }?>
                </div>
                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="" placeholder="Enter Name" autocomplete="on">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Birthdate</label>
                        <input type="date" name="dob" class="form-control" id="">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Credit Card" autocomplete="on">
                    </div> -->
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <textarea name="address" id="" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Profile Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Name on card</label>
                            <input type="text" name="card_holder" class="form-control" id="cc-name" placeholder="Name on card" required="">
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                            Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Credit card number</label>
                            <input type="text" name="card_number" class="form-control" id="cc-number" placeholder="0000-0000-0000-0000" minlength="19" maxlength="19" required="">
                            <div class="invalid-feedback">
                            Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Expiration</label>
                            <input type="text" name="e_date" class="form-control" id="cc-expiration" placeholder="MM/YY" minlength="5" maxlength="5" required="">
                            <div class="invalid-feedback">
                            Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">CVV</label>
                            <input type="password" name="cvv" class="form-control" id="cc-cvv" placeholder="&#9679;&#9679;&#9679;" class="placeicon" minlength="3" maxlength="3" required="">
                            <div class="invalid-feedback">
                            Security code required
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="btn" class="btn btn-primary float-end">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="public/js/bootstrap.bundle.min.js"></script>
  </body>
</html>