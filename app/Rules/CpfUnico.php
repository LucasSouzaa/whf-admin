<?php

namespace App\Rules;

use App\Usuario;
use Illuminate\Contracts\Validation\Rule;

class CpfUnico implements Rule
{
    private $ignore;

    public function __construct($ignore = 0)
    {
        $this->ignore = $ignore;
    }

    public function passes($attribute, $value)
    {
        $consulta = Usuario::where('cpf', cleanCpf($value));

        if ($this->ignore) {
            $consulta->where('id', '<>', $this->ignore);
        }
        return $consulta->count() === 0;
    }

    public function message()
    {
        return 'CPF já cadastrado!';
    }
}
