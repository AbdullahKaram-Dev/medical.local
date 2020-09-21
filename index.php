<?php require_once 'app.php'; ?>

<?php

if (isset($_POST['submit'])){

    foreach ($_POST as $key => $value){

     $$key = prepareInput($_POST[$key]);
    }


    if (! isRequired($name)){
        $errors['name'] = 'name is required';
    } elseif (! isString($name)){
        $errors['name'] = 'name must be string';
    } elseif (! isBetween($name,5,50)){
        $errors['name'] = 'must between 5 and 50 chars';
    }

    if (! isRequired($email)){
        $errors['email'] = 'email is required';
    } elseif (! isEmail($email)){
        $errors['email'] = 'not valid email';
    } elseif (! isBetween($email,5,50)){
        $errors['email'] = 'must between 5 and 50 chars';
    }

    if (! isRequired($phone)){
        $errors['phone'] = 'is required';
    } elseif (! IsNumeric($phone)){
        $errors['phone'] = 'phone must be number';
    } elseif (! isBetween($phone,10,11)){
        $errors['phone'] = 'phone must be 11 number';
    }

    if (getOne('cities',"city_id = '$city_id'") === []) {
        $errors['city_id'] = 'choose correct city';
    }

    if (getOne('services',"service_id = '$service_id'") === []){
        $errors['service_id'] = 'choose correct service';
    }

    if (empty($errors)){
        $data = [

          "order_name" => "$name",
          "order_email"=> "$email",
          "order_phone"=> "$phone",
          "city_id"    => "$city_id",
          "service_id" => "$service_id",
               ];

        $is_inserted = insert("orders",$data);

    if ($is_inserted){

        $success = "Order Send Success";
    }else{

        $query_error = "Order Not Send Try Again";
    }

    }


}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <title>Medical Services</title>
  </head>
  <body >


    <h1 class="text-center py-3 my-3 ">Reservation Form</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <img src="assets/images/5.png" alt="" style="max-width:100%">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                </div>
                        <?php include ADMIN.'inc/messages.php'?>
                <form class="border p-5 my-3 " style="background-color:#4A5055;" method="POST" action="">
                    <div class="form-group">
                        <label for="name"  class="text-white">Your Name <?php getError('name') ?></label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email"  class="text-white">Your Email <?php getError('email') ?></label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>

                    <div class="form-group">
                        <label for="phoneNumber"  class="text-white">Your Phone <?php getError('phone') ?></label>
                        <input type="text" name="phone" class="form-control" id="phoneNumber">
                    </div>

                    <div class="form-group">
                        <label for="city"  class="text-white">Your City <?php  getError('city_id') ?></label>
                        <?php $cities = getWhere("cities", "city_is_active = '1'"); ?>
                        <select name="city_id" class="form-control" id="city">
                            <?php foreach($cities as $city): ?>
                                <option value="<?php echo $city['city_id']; ?>"> <?php echo $city['city_name']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group"  >
                        <label for="ser"  class="text-white">Choose Service <?php getError('service_id') ?></label>
                        <?php $services = getAll("services"); ?>
                        <select name="service_id" class="form-control" id="ser">
                            <?php foreach ($services as $service): ?>
                            <option value="<?php echo $service['service_id']; ?>"><?php echo $service['service_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                   
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>

            </div>
            
        </div>
    </div>

  
  
  </body>
</html>
