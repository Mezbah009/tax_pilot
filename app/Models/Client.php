<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;



    public function clientCategory()
    {
        return $this->belongsTo(ClientCategory::class, 'client_category_id');
    }
}
