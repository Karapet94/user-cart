<?php
class Login_model extends CI_Model{
    public function checkIfUserExist($email, $password)
    {
        $res = $this->db
            ->where('email', $email)
            ->get('u_cart_users')
            ->row_array();

        return empty($res) ? false : password_verify($password, $res['password']);
    }
    public function getId($email){
        return $this->db
            ->select('id')
            ->where('email', $email)
            ->get('u_cart_users')
            ->row_array();
    }
}