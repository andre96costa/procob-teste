<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = ['descricao', 'valor', 'status'];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_produtos', 'produto_id', 'pedido_id');
    }
}
