<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    
    protected $table = "pedidos";
    protected $fillable = ['numero_do_pedido', 'status_pedido', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'pedido_produtos', 'pedido_id', 'produto_id');
    }
}
