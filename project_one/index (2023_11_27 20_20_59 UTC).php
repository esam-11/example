<?php
include_once 'controller/EmployeeController.php';
include_once 'model/EmployeeModel.php';

$model = new EmployeeModel();

$controller = new EmployeeController($model);

if (isset($_GET['action']) && $_GET['action'] == 'addEmployee') {
    $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone']
    );
    $controller->create($data);
}
if (isset($_GET['action']) && $_GET['action'] == 'deleteEmployee') {
    $id =$_POST['employee_id'];

    $controller->delete($id);
}


    $controller->index();

