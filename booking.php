<?php
session_start(); // Start the session at the beginning of the script

?>

<div class="container-fluid">
    <form action="" id="manage-book">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
        <input type="hidden" name="venue_id" value="<?php echo isset($_GET['venue_id']) ? $_GET['venue_id'] : ''; ?>">

        <div class="form-group">
            <label for="" class="control-label">Full Name</label>
            <input type="text" class="form-control" name="name" autocomplete="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" required readonly>
        </div>
        
        <div class="form-group">
            <label for="" class="control-label">Address</label>
            <textarea cols="30" rows="2" required="" name="address" autocomplete="street-address" class="form-control"><?php echo isset($address) ? $address : ''; ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="" class="control-label">Email</label>
            <input type="email" class="form-control" name="email" autocomplete="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required readonly>
        </div>
        
        <div class="form-group">
            <label for="" class="control-label">Contact #</label>
            <input type="text" class="form-control" name="contact" autocomplete="tel" value="<?php echo isset($contact) ? $contact : ''; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="" class="control-label">Duration</label>
            <input type="number" class="form-control" name="duration" autocomplete="off" value="<?php echo isset($duration) ? $duration : ''; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="" class="control-label">Desired Event Schedule</label>
            <input type="text" class="form-control datetimepicker" name="schedule" autocomplete="off" value="<?php echo isset($schedule) ? $schedule : ''; ?>" required>
        </div>
    </form>
</div>

<script>
$('.datetimepicker').datetimepicker({
    format: 'Y/m/d H:i',
    startDate: '+3d'
})
$('#manage-book').submit(function(e) {
    e.preventDefault()
    start_load()
    $('#msg').html('')
    $.ajax({
        url: 'admin/ajax.php?action=save_book',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Book Request Sent.", 'success')
                end_load()
                uni_modal("", "book_msg.php")

            } else {
                alert_toast("Please Login to Register.", 'danger')
                end_load()
                uni_modal("", "error_msg.php")
            }
        }
    })
})
</script>
