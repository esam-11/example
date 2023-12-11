<?php
require_once "ConnectDB.php";


abstract class CrudModel {
    
    abstract public function Index();
    abstract public function Show($id);
    abstract public function Create($data);
    abstract public function update($id, $data);
    abstract public function delete($id);
}
