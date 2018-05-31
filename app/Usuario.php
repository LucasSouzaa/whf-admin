<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function getCpfAttribute()
    {
        return vsprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', str_split($this->attributes['cpf']));
    }
}
