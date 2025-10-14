<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuKopi extends Model
{
    protected $table = 'menu_kopi';

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'menu_id');
    }
}
