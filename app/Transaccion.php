<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    public function compras(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    public function ventas(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    public function pagos(){
        return $this->belongsTo(Pago::class);
    }

    public function envios(){
        return $this->belongsTo(Envio::class);
    }
}
