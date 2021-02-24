<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //
    public function compras()
    {
        return $this->belongsToMany('App\Compras');
    }
}
