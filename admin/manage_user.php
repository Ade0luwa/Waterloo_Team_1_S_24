<?php 
include 'db_connect.php'; 

$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = array();
if ($id) {
    $query = $conn->query("SELECT * FROM clients WHERE id = $id");
    $data = $query->fetch_assoc();
}
?>
<div class="container-fluid">
    <form id="client-form">
        <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : '' ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($data['name']) ? $data['name'] : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($data['username']) ? $data['username'] : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($data['email']) ? $data['email'] : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
<script>
$(document).ready(function(){
    $('#client-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'ajax.php?action=save_client',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response == 1) {
                    alert('Client successfully saved.');
                    location.reload();
                } else if (response == 2) {
                    alert('Username already exists.');
                } else {
                    alert('An error occurred while saving the client.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown); // Log AJAX errors
                alert('An AJAX error occurred.');
            }
        });
    });
});

</script>