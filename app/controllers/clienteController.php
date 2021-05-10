<?php

class ClienteController
{
    public function index()
    {
        echo "PAGINA DE CLIENTES";
    }

    public function mostrar()
    {
        echo "Listado de clientes";
    }

    public function saludo($param=null)
    {
        echo isset($param) ? "Hola {$param[0]}" : "No ha especificado su nombre";
    }

    public function suma($param=null)
    {
        $num1 = isset($param[0]) ? $param[0] : 0;
        $num2 = isset($param[1]) ? $param[1] : 0;
        $rpta = $num1 + $num2;
        echo "LA SUMA DE {$num1} + {$num2} = {$rpta}";
    }

    public function multi($param = null)
    {
        $num1 = isset($param[0]) ? $param[0] : 0;
        $num2 = isset($param[1]) ? $param[1] : 0;
        $rpta = $num1 + $num2;
        echo "EL producto DE {$num1} * {$num2} = {$rpta}";
    }
}