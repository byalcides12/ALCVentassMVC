<?php

namespace App\Controllers;

use Libs\Controller;

class TestController extends Controller
{
    public function __construct()
    {
        $this->loadDirectoryTemplate('test');
    }
    public function index()
    {
        //$template = new \League\Plates\Engine(MAINPATH . 'app/views/test');
       // $template->setFileExtension('phtml');
        echo $this->template->render('index');
    }

    public function saludo($param = null)
    {
        if ($param == null){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        }else{
            $nombre = isset($param[0]) ? $param[0] : '';
        }

        

        //$this->renderView('test/saludo', $data);
        //$template = new \League\Plates\Engine(MAINPATH . 'app/views/test');
        //$template->setFileExtension('phtml');
        echo $this->template->render('saludo', ['nombre' =>$nombre]);
    }

    public function suma($param = null)
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
