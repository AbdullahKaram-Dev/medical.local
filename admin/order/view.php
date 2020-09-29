<?php require_once '../../app.php'; ?>

<?php require_once ADMIN . "inc/header.php"; ?>


<div class="container">
    <div class="row">

<div class="col-12">
     <h1 class="text-center my-3">View All Orders</h1>
</div>
 <div class="col-12 mx-auto my-5 border p-3">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">City</th>
                <th scope="col">Service</th>
                <th scope="col">Requested At</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $orders = OrdersWithJoin("orders","cities","services");
        ?>

        <?php  foreach ($orders as $order): ?>

                <tr>
                    <td><?php typeCount(); ?></td>
                    <td><?php echo $order['order_name']; ?></td>
                    <td scope="col"><?php echo $order['order_email']; ?></td>
                    <td scope="col"><?php echo $order['order_phone']; ?></td>
                    <td scope="col"><?php echo $order['city_name']; ?></td>
                    <td scope="col"><?php echo $order['service_name']; ?></td>
                    <td scope="col"><b><?php echo $order['order_created_at']; ?></b></td>

                    <td>
                        <a href="<?php echo AURL . "order/delete/" . $order['order_id'];  ?>" class="btn btn-danger delete-record" >Delete</a>
                    </td>
                </tr>
        <?php endforeach;  ?>

        </tbody>
    </table>
</div>



</div>
    </div>

<?php require_once ADMIN . "inc/footer.php"; ?>

