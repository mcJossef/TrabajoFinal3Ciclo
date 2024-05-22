<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $table = 'imagen';
    public $timestamps = false;
    protected $fillable = ['id_producto','nombre'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto','id_producto');
    }
}
