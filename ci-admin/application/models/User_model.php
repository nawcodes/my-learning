<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends Ci_model
{
    public function update_user()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $name = $this->input->post('name' , true);
        $email = $this->input->post('email' , true);

        //check bila have images
        $upload_image = $_FILES['image']['name'];
        
        
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/profile/';
            if($upload_image){

            $this->load->library('upload', $config);
            
            if ( $this->upload->do_upload('image')) {
                $old_image = $user['images'];   

                if ($old_image != 'default.png') {
                    unlink(FCPATH . 'assets/images/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('images', $new_image);
            }else{
               echo  $this->upload->display_errors();
            }
        }
        
        
        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');

    }
}