<?php require_once '../app.php'; ?>
<?php require_once ADMIN . 'inc/header.php'; ?>


<div class="container">
    <div class="row">

        <div class="col-md-6 my-5">
            <div class="card text-center">
                <div class="card-header">
                    All Orders
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Orders </h5>
                    <p class="card-text display-3"><?php echo getCount("orders"); ?></p>
                    <a href="<?php echo AURL.'order/view'; ?>"  class="btn btn-success">Go To Orders</a>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto my-5">
            <div class="card text-center">
                <div class="card-header">
                    All Services
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Services</h5>
                    <p class="card-text display-3"><?php echo getCount("services"); ?></p>
                    <a href="<?php echo AURL.'service/view'; ?>" class="btn btn-success">Go To Services</a>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>

        <div class="col-8 mx-auto my-2">
            <div class="card text-center">
                <div class="card-header">
                    All Orders Today
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Orders This Day</h5>
                    <p class="card-text display-3"><?php echo getCountWhere("orders", "DATE(order_created_at) = CURDATE()"); ?></p>
                    <a href="<?php echo AURL.'order/view'; ?>"  class="btn btn-info">Go To Orders</a>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>


        </div>
    </div>

<?php require_once ADMIN . 'inc/footer.php'; ?>
