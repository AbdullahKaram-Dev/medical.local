<?php require_once "../app.php"?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo URL;  ?>assets/css/bootstrap.css">

<title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto my-5">
            <div class="card ">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                    <?php

                        if(isset($_POST['submit'])){

                             foreach ($_POST as $key => $value){

                                $$key = prepareInput($_POST[$key]);

                            }

                            if (! isRequired($email)){

                                 $errors['email'] = ' email required';
                            } elseif (! isEmail($email)){

                                 $errors['email'] = 'not email';
                            } elseif (! isBetween($email,5,100)){

                                $errors['email'] = 'must be 100 char';
                            }


                            if (! isRequired($password)){

                                $errors['password'] = ' password required';

                            } elseif (! isString($password)){

                                $errors['password'] = 'its not valid password';

                            } elseif (! isBetween($password,5,20)){

                                $errors['password'] = 'password must between 5 and 100 chars';
                            }


                            if(empty($errors)) {
                                $admin = getOne("admins", "admin_email = '$email' ");
                                if(empty($admin)) {
                                    $errors['email'] = "email is not correct";
                                } elseif(! password_verify($password, $admin['admin_password']) ) {
                                    $errors['password'] = "password is not correct";
                                } else {

                                    setSession('admin_id', $admin['admin_id']);
                                    setSession('admin_name', $admin['admin_name']);
                                    setSession('admin_email', $admin['admin_email']);
                                    setSession('admin_type', $admin['admin_type']);

                                    aredirect("index.php");
                                }

                            }


                        }
                    ?>

                    <div>
                        <form class="border p-5 my-3 " method="POST" action="">
                            <div class="form-group">
                                <label for="email"  class="text-dark ">Email : <?php  getError('email');  ?> </label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password"  class="text-dark ">Password : <?php  getError('password');  ?> </label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL; ?>assets/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URL; ?>assets/js/bootstrap.js"></script>
</body>
</html>
