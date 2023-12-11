<?php
include_once 'CrudModel.php';
require_once "ConnectDB.php";
class EmployeeModel extends CrudModel {
    private $db;

    private $type='1';
    public function Index(){
         $this->db= DB::getInstance()->getConnection();
         $stmt =$this->db->query("SELECT * FROM users where type_id = 1");
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
     

    }

    public function show($id) {      
        $this->db = DB::getInstance()->getConnection();
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function create($data) {
        $this->db= DB::getInstance()->getConnection();
        $query = "INSERT INTO users  (name , email,address,phone,type_id)VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([ $data['name'],$data['email'], $data['address'],  $data['phone'],  $this->type]);
    
    }
    public function update($id, $data) {
            $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ?, address = ?, phone = ? WHERE id = ?");
            return $stmt->execute([$data['name'], $data['email'], $data['address'], $data['phone'], $id]);
        
    }

    public function delete($id) {
        $this->db= DB::getInstance()->getConnection();
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}
