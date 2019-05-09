<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome','cpf','email','telefone','celular','perfil'];
    public $timestamps = false;
}
