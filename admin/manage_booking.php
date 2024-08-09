<?php include 'db_connect.php' ?>

<?php
if (isset($_GET['id'])) {
    $booking = $conn->query("SELECT * from venue_booking where id = " . $_GET['id']);
    foreach ($booking->fetch_array() as $k => $v) {
        $$k = $v;
    }
}
?>
<div class="container-fluid">
    <form action="" id="manage-book">
    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>" required>
    <div class="form-group">
        <label for="" class="control-label">Venue</label>
        <select name="venue_id" id="" class="custom-select select2" disabled>
            <option></option>
            <?php
            $venue = $conn->query("SELECT * FROM venue ORDER BY venue ASC");
            while ($row = $venue->fetch_assoc()):
                ?>
                <option value="<?php echo $row['id'] ?>" <?php echo isset($venue_id) && $venue_id == $row['id'] ? 'selected' : '' ?>>
                    <?php echo ucwords($row['venue']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
        <div class="form-group">
            <label for="" class="control-label">Full Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name : '' ?>" required readonly>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Address</label>
            <textarea cols="30" rows="2" required readonly name="address"
                class="form-control"><?php echo isset($address) ? $address : '' ?> </textarea>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo isset($email) ? $email : '' ?>" required readonly>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Contact #</label>
            <input type="text" class="form-control" name="contact" value="<?php echo isset($contact) ? $contact : '' ?>" required readonly>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Duration</label>
            <input type="text" class="form-control" name="duration"
                value="<?php echo isset($duration) ? $duration : '' ?>" required readonly>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Desired Event Schedule</label>
            <input type="text" class="form-control datetimepicker" name="schedule"
                value="<?php echo isset($datetime) ? date("Y-m-d H:i", strtotime($datetime)) : '' ?>" required readonly>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Status</label>
            <select name="status" id="" class="custom-select">
                <option value="0" <?php echo isset($status) && $status == 0 ? "selected" : '' ?>>For Verification</option>
                <option value="1" <?php echo isset($status) && $status == 1 ? "selected" : '' ?>>Confirmed</option>
                <option value="2" <?php echo isset($status) && $status == 2 ? "selected" : '' ?>>Cancelled</option>
            </select>
        </div>
    </form>
</div>

<script>
    $('#manage-book').submit(function (e) {
        e.preventDefault();


        $.ajax({
            url: 'ajax.php?action=save_book_admin',
            method: "POST",
            data: $(this).serialize(),
            success: function (resp) {
                console.log("AJAX Response:", resp);
                if (resp.trim() === "1") {
                    alert_toast("Book successfully updated", "success");
                    setTimeout(function () {
                        location.reload();
                    }, 1500);
                } else if (resp.trim() === "2") {
                    alert_toast("Booking already exists", "error");
                } else if (resp.includes("Mailer Error:")) {
                    alert_toast(resp, "error"); // Handle email errors
                } else if (resp.includes("Message sent!")) {
                    alert_toast("Book successfully updated and email sent", "success");
                    setTimeout(function () {
                        location.reload();
                    }, 1500);
                } else {
                    alert_toast("Failed to update booking", "error");
                }
            }
            ,
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: ", textStatus, errorThrown);
                alert_toast("An error occurred. Please try again.", "error");
            }
        });
    });

</script>