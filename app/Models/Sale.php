<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
        'sale_date',
        'total',
        'status',
    ];

    // Relaciones
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function saleDetails(){
        return $this->hasMany(SaleDetails::class);
    }

    //Actualizar stock
    public function upd_stock($id, $quantity) {
        $product = Product::find($id);
        $product->sub_stock($quantity);
    }
}
