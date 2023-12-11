<?php
include_once 'model/EmployeeModel.php';

class EmployeeController {
    protected $model;

    public function __construct(EmployeeModel $model) {
        $this->model = $model;
    }

    public function index() {
        $employees = $this->model->Index();
        include 'view/employee-list.php';
    }

    public function show($id) {
        $employees = $this->model->show($id);
        include 'view/employee-list.php';
    }

    public function  create($data) {
            $this->model->create($data);

    }
    public function  delete($id) {
        $this->model->delete($id);
    }

    public function  update($id , $data) {
        $this->model->update($id,$data);

}

}
