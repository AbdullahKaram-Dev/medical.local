<?php require_once '../../app.php'; ?>

<?php require_once ADMIN . "inc/header.php"; ?>



<div class="container">
    <div class="row">


        <?php

        if (isset($_POST['submit'])) {
            foreach ($_POST as $key => $value) {

                $$key = prepareInput($_POST[$key]);

            }
            if (!isRequired($name)) {

                $errors['name'] = 'name required';
            } elseif (!isString($name)) {

                $errors['name'] = 'not string';
            } elseif (!isBetween($name, 5, 100)) {

                $errors['name'] = 'must between 5 and 100 char';
            }

            if(empty($errors)) {
                $data = [
                    'service_name' => $name
                ];

                $is_inserted = insert("services", $data);

                if($is_inserted) {
                    // display success message
                    $success = "added successfully";
                } else {
                    // an
                    $query_error = "error while adding";
                }
            }
        }
        ?>


        <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Add New Service</h3>
            <div>

                <?php require ADMIN . "inc/messages.php"; ?>

                <form class="border p-5 my-3 " method="POST" action="">
                    <div class="form-group">
                        <label for="name"  class="text-dark ">Service Name : <?php getError('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>


    </div>
    </div>

<?php require_once ADMIN . "inc/footer.php"; ?>

