<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends Ci_model
{
    public function register()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
            'images' => 'default.jpg',
            'role_id' => 2,
            'is_active' => 1
        ];

        $this->db->insert('user', $data);

        
    }
}
