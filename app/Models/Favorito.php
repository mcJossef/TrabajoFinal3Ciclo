<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;
    protected $table = 'favorito';
    public $timestamps = false;
    protected $primaryKey = 'id_favorito';
    protected $fillable = [
        'id_user','id_producto'
    ];


    public function producto()
    {
        return $this->belongsTo(Producto::class,'id_producto','id_producto');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user','id');
    }
}
