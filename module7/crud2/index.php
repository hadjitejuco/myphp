<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>CRUD Operations</h2>
            <form id="userForm">
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="middle_initial">Middle Initial:</label>
                    <input type="text" class="form-control" id="middle_initial" name="middle_initial" maxlength="1">
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday:</label>
                    <input type="text" class="form-control" id="birthday" name="birthday" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" readonly>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            <table id="userTable" class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Initial</th>
                        <th>Birthday</th>
                        <th>Age</th>
                        <th>City</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#birthday').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        onSelect: function(dateText, inst) {
            var today = new Date();
            var birthDate = new Date(dateText);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            $('#age').val(age);
        }
    });

    var table = $('#userTable').DataTable({
        ajax: {
            url: 'crud.php',
            type: 'POST',
            data: { action: 'read' },
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'last_name' },
            { data: 'first_name' },
            { data: 'middle_initial' },
            { data: 'birthday' },
            { data: 'age' },
            { data: 'city' },
            {
                data: null,
                render: function (data, type, row) {
                    return `<button class="btn btn-sm btn-primary edit" data-id="${row.id}">Edit</button>`;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `<button class="btn
btn-sm btn-danger delete" data-id="${row.id}">Delete</button>`;
                }
            }
        ]
    });
    
    $('#userForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize() + '&action=create';
        $.post('crud.php', formData, function(response) {
            $('#userForm')[0].reset();
            table.ajax.reload();
        });
    });
    
    $('#userTable tbody').on('click', '.delete', function() {
        var id = $(this).data('id');
        $.post('crud.php', { id: id, action: 'delete' }, function(response) {
            table.ajax.reload();
        });
    });
    
    $('#userTable tbody').on('click', '.edit', function() {
        var id = $(this).data('id');
        var row = table.row($(this).parents('tr')).data();
        $('#last_name').val(row.last_name);
        $('#first_name').val(row.first_name);
        $('#middle_initial').val(row.middle_initial);
        $('#birthday').val(row.birthday);
        $('#age').val(row.age);
        $('#city').val(row.city);
        $('#userForm').off('submit').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize() + '&id=' + id + '&action=update';
            $.post('crud.php', formData, function(response) {
                $('#userForm')[0].reset();
                $('#userForm').off('submit').on('submit', function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize() + '&action=create';
                    $.post('crud.php', formData, function(response) {
                        $('#userForm')[0].reset();
                        table.ajax.reload();
                    });
                });
                table.ajax.reload();
            });
        });
    });
});
</script>
</body>
</html>
