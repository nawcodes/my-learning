    <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    // menu
    public function addMenu()
    {
        $data = [
            'menu' => htmlspecialchars($this->input->post('name')),
            'icons' => $this->input->post('icons')
        ];

        $this->db->insert('user_menu', $data);
    }

    public function updateMenu($id)
    {
        $data = [
            'menu' => htmlspecialchars($this->input->post('name', true)),
            'icons' => $this->input->post('icons',true)

        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    // end menu
    
    // sub menu model

    public function getSubmenu(){
        $query = "SELECT `user_submenu`.*,`user_menu`.`menu` 
                    FROM `user_submenu` 
                    JOIN `user_menu` ON `user_submenu`.`menu_id` = `user_menu`.`id`";
         return   $this->db->query($query)->result_array();
        
    }
    public function addSubmenu(){
        $data = [
            'name' => htmlspecialchars($this->input->post('name',true)),
            'menu_id' => $this->input->post('menu',true),
            'url' => htmlspecialchars( $this->input->post('url')),
            'is_active' => $this->input->post('is_active')
        ];

        $this->db->insert('user_submenu', $data);
    }

    public function up_Submenu(){
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'menu_id' => $this->input->post('menu', true),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'is_active' => ($this->input->post('is_active'))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_submenu', $data);
    }

    public function delete_sm($id){
        $this->db->where('id', $id);
        $this->db->delete('user_submenu');
    }

    
    

    // endsub menu

    // icons model
    public function Add_icons()
    {
        $data = [
            'name' => $this->input->post('name'),
            'name_icons' => $this->input->post('i_name')
        ];

        $this->db->insert('icons', $data);
    }

    public function update_Ic()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name')),
            'name_icons' => htmlspecialchars($this->input->post('i_name'))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('icons', $data);
    }

    public function delete_Ic($id)
    {
        $this->db->delete('icons', ['id' => $id]);
    }

    // end icons

}
