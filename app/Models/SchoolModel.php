<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolModel extends Model
{
    protected $table = 'school_details';

    protected $allowedFields = [
        'name',
        'location'
    ];
}