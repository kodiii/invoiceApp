<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $fillable = [
        'number',
        'total',
        'start_date',
        'end_date',
        'invoice_client_id',
        'invoice_status_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'invoice_client_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'invoice_status_id');
    }

    public function path()
    {
        return route('invoices.show', $this);
    }
}
