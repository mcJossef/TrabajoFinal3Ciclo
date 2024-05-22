<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'venta';
    public $timestamps = false;


    public function producto()
    {
        $this->belongsTo(Producto::class,'id_producto','id_prodcuto');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user','id');
    }
}
