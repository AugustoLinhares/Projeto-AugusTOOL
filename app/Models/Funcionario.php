<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model {

    protected $table = "funcionario";

    protected $guarded = [];

    public function registro(): HasMany {
        return $this-> hasMany(Registro::class);
    }
}