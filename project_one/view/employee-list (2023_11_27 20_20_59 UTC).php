
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Employees</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $employee): ?>
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox<?= $employee['id'] ?>" name="options[]" value="<?= $employee['id'] ?>">
                                        <label for="checkbox<?= $employee['id'] ?>"></label>
                                    </span>
                                </td>
                                <td><?= $employee['name'] ?></td>
                                <td><?= $employee['email'] ?></td>
                                <td><?= $employee['address'] ?></td>
                                <td><?= $employee['phone'] ?></td>
                                <td>
                                    <a href="#deleteEmployeeModal<?= $employee['id'] ?>" class="delete" data-toggle="modal" data-id="<?= $employee['id'] ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="index.php?action=addEmployee" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($employees as $employee): ?>
    <div id="deleteEmployeeModal<?= $employee['id'] ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php?action=deleteEmployee" method="post">
                    <div class="modal-header">                        
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Are you sure you want to delete this employee?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                        <!-- Add a hidden input field to hold the employee ID -->
                        <input type="hidden" name="employee_id" value="<?= $employee['id'] ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>
