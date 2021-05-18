
<?php include_once 'header.php'; ?>
    <br><br><br><br><br>
    <?php if($crud->insert_booked_slot(4,4)) echo "INSERTED!"; else echo "NOT INSERTED!"; ?>

<?php include_once 'footer.php'; ?>