<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registro extends Model {

    protected $table = "registro";

    protected $guarded = [];

    public function funcionario(): HasOne {
        return $this -> hasOne(Funcionario::class);
    }
}