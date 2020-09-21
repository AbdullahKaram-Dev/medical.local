<?php require_once '../../app.php'; ?>
<?php Super_admin(); ?>
<?php require_once ADMIN.'inc/header.php'; ?>


<?php

if(isset($_GET['admin_id']) and is_numeric($_GET['admin_id'])) {
    $admin_id = $_GET['admin_id'];

    $admin = getOne("admins", "admin_id = '$admin_id'");

    if(empty($admin)) {
        aredirect("manager/view.php");
    }

} else {
    aredirect("manager/view.php");
}


?>


<?php

$Role = ['admin','super_admin'];

    if (isset($_POST['submit'])){

        foreach ($_POST as $key => $value){

            $$key = prepareInput($_POST[$key]);
        }

        if (! isRequired($name)){
            $errors['name'] = 'name is required';
        } elseif (! isString($name)){
            $errors['name'] = 'name must be string';
        } elseif (! isBetween($name,5,50)){
            $errors['name'] = 'name must between 5 and 50 chars';
        }

        if (! isRequired($email)){
            $errors['email'] = 'email is required';
        } elseif (! isEmail($email)){
            $errors['email'] = 'must be valid email';
        } elseif (! isBetween($email,5,50)){
            $errors['email'] = 'email must between 5 and 50 chars';
        }

        if (! in_array($type,$Role)){
            $errors['type'] = 'this type is invalid';
        }

        if (! empty($password)){

            if (! isString($password)){
                $errors['password'] = 'password must be string';
            } elseif (! isBetween($password,5,20)){
                $errors['password'] = 'password must between 5 and 20 chars';
            }

            if (empty($errors)){

                    $password = password_hash($password,PASSWORD_DEFAULT);
                        $data = [

                        "admin_name"     =>"$name",
                        "admin_email"    =>"$email",
                        "admin_password" =>"$password",
                        "admin_type"     =>"$type",
                                ];

                        $update_data = update("admins",$data,"admin_id = '$admin_id'");

                        if ($update_data){
                            $admin = getOne("admins","admin_id = '$admin_id'");
                            $success = 'data updated successfully';
                        }else{

                            $query_error = 'error happen try again later';
                        }
                    }

                        }else{


                        $data = [

                        "admin_name"     =>"$name",
                        "admin_email"    =>"$email",
                        "admin_type"     =>"$type",
                    ];

                    $update_data = update("admins",$data,"admin_id = '$admin_id'");

                    if ($update_data){

                        $admin = getOne("admins","admin_id = '$admin_id'");
                        $success = 'data updated successfully';
                    }else{

                        $query_error = 'error happen try again later';
                    }

                }

    }



?>


<div class="container">
    <div class="row">


<!-- task  -->
<!-- confirm password -->
<!-- validate type in array -->

    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Edit Info About Admin</h3>
            <div>
                <?php  require_once ADMIN . 'inc/messages.php'; ?>
                <form class="border p-5 my-3 " method="POST" action="">
                    <div class="form-group">
                        <input type="hidden" name="id" value="">
                        <label for="name"  class="text-dark "> Name <?php  getError('name'); ?></label>
                        <input type="text" name="name" value="<?php echo $admin['admin_name']; ?>" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="email"  class="text-dark "> Email <?php  getError('email'); ?></label>
                        <input type="text" name="email" value="<?php echo $admin['admin_email']; ?>" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="type"  class="text-dark "> Type <?php getError('type'); ?> </label>
                        <select name="type" class="form-control" id="type">
                            <option value="admin"<?php echo ($admin['admin_type'] == 'admin' ? 'selected' : ''); ?>>Admin </option>
                            <option value="super_admin"<?php echo ($admin['admin_type'] == 'super_admin' ? 'selected' : ''); ?>>Super Admin </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Password <?php getError('password'); ?> </label>
                        <input type="password" name="password"  class="form-control" id="name">
                    </div>

                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>



    </div>
    </div>


<?php require_once ADMIN.'inc/footer.php'; ?>