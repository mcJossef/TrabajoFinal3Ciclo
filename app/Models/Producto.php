<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    public $timestamps = false;
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre','descripcion','precio','fecha_publicacion','id_categoria','id_user','id_estado_producto'
    ];
    
    public function estadoProducto()
    {
        return $this->belongsTo(EstadoProducto::class, 'id_estado_producto','id_estado_producto');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria','id_categoria');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user','id');
    }
    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'id_producto','id_producto');
    }

    public function favoritoByUser($idUsuario){
        return $this->hasMany(Favorito::class, 'id_producto')->where('id_user', $idUsuario);
    }
    
}
