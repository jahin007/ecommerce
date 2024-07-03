<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['id','cus_id','ship_id','pay_id','total','status'];
    protected function customer(){
        return $this->belongsTo(Customer::class,'cus_id');
    }

    protected function shipping(){
        return $this->belongsTo(Shipping::class,'ship_id');
    }

    protected function payment(){
        return $this->belongsTo(Payment::class,'pay_id');
    }
}
