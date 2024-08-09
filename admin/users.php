<?php 
include 'db_connect.php'; 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-theme float-right btn-sm" id="new_client"><i class="fa fa-plus"></i> New Client</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <table class="table-striped table-bordered col-md-12" id="clientTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $clients = $conn->query("SELECT * FROM clients ORDER BY name ASC");
                        $i = 1;
                        while ($row = $clients->fetch_assoc()):
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i++ ?></td>
                            <td><?php echo ucwords($row['name']) ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-theme">Action</button>
                                    <button type="button" class="btn btn-theme dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item edit_client" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_client" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#clientTable').DataTable();
    
    $('#new_client').click(function(){
        uni_modal('New Client', 'manage_user.php');
    });
    
    $('.edit_client').click(function(){
        var id = $(this).data('id');
        uni_modal('Edit Client', 'manage_user.php?id=' + id);
    });

    $('.delete_client').click(function(){
        var id = $(this).data('id');
        if (confirm("Are you sure you want to delete this client?")) {
            $.ajax({
                url: 'ajax.php?action=delete_client',
                method: 'POST',
                data: { id: id },
                success: function(response) {
                    if (response == 1) {
                        alert('Client successfully deleted.');
                        location.reload();
                    } else {
                        alert('An error occurred while deleting the client.');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus, errorThrown); // Log AJAX errors
                    alert('An AJAX error occurred.');
                }
            });
        }
    });
});
</script>