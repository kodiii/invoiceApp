<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'sku', 
        'description', 
        'quantity', 
        'price', 
        'line_total', 
        'invoice_id'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice.id');
    }
}
