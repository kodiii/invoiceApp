<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'first_name', 
        'last_name', 
        'address', 
        'zip_code',
        'phone_nr',
        'email'
    ];
    
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
