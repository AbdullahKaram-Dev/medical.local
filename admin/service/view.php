<?php require_once '../../app.php'; ?>

<?php require_once ADMIN . "inc/header.php"; ?>

<div class="container">
    <div class="row">

<div class="col-12">
     <h1 class="text-center my-3">View All Services</h1>
</div>
 <div class="col-8 mx-auto my-5 border p-3">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $services = getAll("services");
        ?>

        <?php foreach($services as $service): ?>
                <tr>
                    <td><?php typeCount(); ?></td>
                    <td><?php echo ucfirst($service['service_name']); ?></td>
                    <td>
                        <a href="<?php echo AURL . "service/edit.php?service_id=" . $service['service_id'] ?>" class="btn btn-info" >Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo AURL . "service/delete.php?service_id=" . $service['service_id'] ?>" class="btn btn-danger" >Delete</a>
                    </td>
                </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>



</div>
    </div>

<?php require_once ADMIN . "inc/footer.php"; ?>

