<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles'; // Optional, only if the table name is not the plural form of the model name

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
