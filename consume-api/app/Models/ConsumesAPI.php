<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumesAPI extends Model
{
    use HasFactory;

    protected $table = 'consumes_a_p_i_s'; // tabela que deve ser acessada
    protected $fillable = ['id', 'name', 'age', 'email']; // dados que serão preenchidos
}
