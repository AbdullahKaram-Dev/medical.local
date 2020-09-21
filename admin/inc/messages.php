<?php if(isset($query_error)): ?>
    <div class="alert alert-danger text-center">
        <?php echo $query_error; ?>
    </div>
<?php endif; ?>


<?php if(isset($success)): ?>
    <div class="alert alert-success text-center">
        <?php echo $success; ?>
    </div>
<?php endif; ?>