<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_customer', 'account_customer', 'id_community'
    ];

    public function community()
    {
        return $this->belongsTo(Community::class, 'id_community');
    }
}
