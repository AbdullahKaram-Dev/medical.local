<?php require_once '../../app.php'; ?>

<?php

    if (isset($_GET['city_id']) && !empty($_GET['city_id'])){

        $city = getOne('cities',"(`city_id`) = '$_GET[city_id]'");

    }

    if (isset($_POST['submit'])){

        foreach ($_POST as $key => $value){

            $$key = prepareInput($_POST[$key]);
        }

        if (! isRequired($name)){

            $errors['name'] = 'is required';
        } elseif (! isString($name)){

            $errors['name'] = 'must be string';
        } elseif (! isBetween($name,5,100)){

            $errors['name'] = 'must between 5 and 100 chars';
        }

        $update = update("`cities`"," `city_name` = '$name'"," `city_id` = '$_GET[city_id]'");

        if (isset($update)){

            aredirect('city/view.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Medical Services</title>
  </head>
  <body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">A-ULER</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cities
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="add.php">Add New</a>
                    <a class="dropdown-item" href="view.php">View All</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Add New</a>
                    <a class="dropdown-item" href="#">View All</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Managers
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Add New</a>
                    <a class="dropdown-item" href="#">View All</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Orders</a>
            </li>



            <li class="nav-item active">
                <a class="nav-link" href="#" target="_blank">Visit Site <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" method="POST" action="#">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="logout">Logout</button>
        </form>
       
    </div>
</nav>



<div class="container">
    <div class="row">
<!-- task  -->
<!-- confirm password -->
<!-- validate type in array -->

    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Edit Info About City</h3>
           
            <div>
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

<script src="<?php echo URL; ?>assets/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URL; ?>assets/js/popper.min.js"></script>
<script src="<?php echo URL; ?>assets/js/bootstrap.js"></script>
    <script>


    </script>



</body>
</html>

