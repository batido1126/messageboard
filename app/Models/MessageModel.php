<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user', 'comment', 'time'];
}
