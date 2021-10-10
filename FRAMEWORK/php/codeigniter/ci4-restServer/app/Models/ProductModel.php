<?php


namespace App\Models;

use CodeIgniter\Model;

Class ProductModel extends Model {

    
    protected $table = 'product';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name',
        'descryption',
        'id_category',
        'id_material_type',
        'id_block_type',
        'price_of_metter',
        'length_m',
        'width_m',
        'heigh_m',
        'slug',
        'image',
        'estimation_time',
        'date_created',
    ];


    public function getProduct() {
        return $this->findAll();
    }
    
}


?>