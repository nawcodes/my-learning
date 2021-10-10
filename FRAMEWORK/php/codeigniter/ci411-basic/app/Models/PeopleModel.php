<?php

namespace App\Models;

use CodeIgniter\Model;

class PeopleModel extends Model
{
    protected $table  = 'people';
    protected $useTimestamps = true;
    

    public function search($keyword) {
        // $builder = $this->table('people');
        // $builder->icke('name', $keyword);

        return $this->table('people')->like('name', $keyword);
    }
}


?>