<?php

class Register_model extends CI_Model{
public function insertUser($username, $email, $password){
    $data = array(
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    );

    return $this->db->insert('u_cart_users', $data);
 }


 public function ifUserExist($email){
     return $this->db
         ->select('email')
         ->where('email', $email)
         ->get('u_cart_users')
         ->row_array();
 }
}