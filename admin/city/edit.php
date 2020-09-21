<?php require_once '../../app.php'; ?>
<?php require_once ADMIN . "inc/header.php"; ?>

<?php

if(isset($_GET['city_id']) and is_numeric($_GET['city_id'])) {
    $city_id = $_GET['city_id'];

    $city = getOne("cities", "city_id = '$city_id'");

    if(empty($city)) {
        aredirect("city/view.php");
    }

} else {
    aredirect("city/view.php");
}


?>


<div class="container">
    <div class="row">
<!-- task  -->
<!-- confirm password -->
<!-- validate type in array -->

    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Edit Info About City</h3>

            <?php
            if(isset($_POST['submit'])) {
                foreach ($_POST as $key => $value) {
                    $$key = prepareInput($_POST[$key]);
                }

                if (! isRequired($name)) {
                    $errors['name'] = "required";
                } elseif (! isString($name)) {
                    $errors['name'] = "must be string";
                } elseif (! isBetween($name, 5,100)) {
                    $errors['name'] = "must be <= 100";
                }

                // if all data is valid, store city in db
                if(empty($errors)) {
                    $data = [
                        'city_name' => $name
                    ];

                    $is_updated = update("cities", $data, "city_id = '$city_id'");

                    if($is_updated) {
                        $city = getOne("cities", "city_id = '$city_id'");
                        // display success message
                        $success = "updated successfully";

                    } else {
                        // an
                        $query_error = "error while updating";
                    }
                }


            }
            ?>
           
            <div>
                <?php require ADMIN . "inc/messages.php"; ?>
                <form class="border p-5 my-3 " method="POST" action="">
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Name : <?php getError('name');  ?></label>
                        <input type="hidden" name="id">
                        <input type="text" name="name" value="<?php echo $city['city_name'] ?>" class="form-control" id="name">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>


</div>
</div>
<?php require_once ADMIN . "inc/footer.php"; ?>
