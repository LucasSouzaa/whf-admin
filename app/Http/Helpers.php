<?php

function cleanCpf($cpf)
{
    return preg_replace( '/[^0-9]/is', '', $cpf);
}
