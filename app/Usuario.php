<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['nome', 'email', 'nascimento', 'cpf', 'senha', 'foto'];

    public function getCpfAttribute()
    {
        return vsprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', str_split($this->attributes['cpf']));
    }

    public function getNascimentoAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['nascimento'])->format('d/m/Y');
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
