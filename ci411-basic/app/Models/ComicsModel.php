<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicsModel extends Model
{
    protected $table  = 'comics';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title',
        'slug',
        'writer',
        'publisher',
        'cover'
    ];

    public function getComics($slug = null) {
        if($slug == null) {
            return $this->findAll();
        }

        return $this->where([
            'slug' => $slug
        ])->first();
    }
    


   
    
}

?>