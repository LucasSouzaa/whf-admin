<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Usuario extends Model
{
    protected $fillable = ['nome', 'email', 'nascimento', 'cpf', 'senha', 'foto'];

    public function getCpfAttribute()
    {
        return vsprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', str_split($this->attributes['cpf']));
    }

    public function getNascimentoAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['nascimento'])->format('d/m/Y');
    }
}
