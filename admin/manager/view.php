<?php require_once '../../app.php'; ?>
<?php Super_admin(); ?>
<?php require_once ADMIN . "inc/header.php"; ?>


<div class="container">
    <div class="row">
<div class="col-12">
     <h1 class="text-center my-3">View All Managers</h1>
</div>
 <div class="col-10 mx-auto my-5 border p-3">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Eamil</th>
                <th scope="col">Type</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php  $users = getAll("admins");  ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php typeCount(); ?></td>
                    <td><?php echo $user['admin_name']; ?></td>
                    <td><?php echo $user['admin_email']; ?></td>
                    <td><?php echo $user['admin_type']; ?></td>

                    <td>
                        <a href="<?php echo AURL.'manager/edit.php?admin_id='.$user['admin_id']; ?>" class="btn btn-info" >Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo AURL.'manager/delete.php?admin_id='.$user['admin_id']; ?>" class="btn btn-danger" >Delete</a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>



</div>
    </div>

<?php require_once ADMIN . "inc/footer.php"; ?>

