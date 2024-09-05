<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function custumer()
    {
        return $this->hasMany(Customer::class, 'id_community');
    }
}
