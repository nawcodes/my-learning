<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'uuid';
    protected $useAutoIncrement = false;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    // SESI 
    protected $allowedFields    = [
        'uuid',
        'name',
        'image',
        'email',
        'phone',
    ];
    // SESI

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];


    public function getUsers() {
        return $this->findAll();
    }
}
