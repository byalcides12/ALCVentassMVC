<?php 

namespace Libs;



class Core
{
    public function __construct()
    {
        //capturamos los elementos de la peticion
        $url = isset($_GET['url'])? $_GET['url']: null;
        //quitamos el ultimo /
        $url = rtrim($url, '/');
        //comvertimos en array los elemntos de la URL(peticion)
        $url = explode('/', $url);

        //echo "<pre>", print_r($url), "</pre>";

        //si el usuario no proporciona un controlador
        if (empty($url[0])){
            //lamamos al controlador predeterminado
            require_once '../app/controllers/homeController.php';
            (new \App\Controllers\HomeController())->index();
            return false;
        }

        //cuando el usuario especifique un controlador
        //formamos la ruta de ese controlador
        $path_controller = '../app/controllers/' . $url[0] . 'Controller.php';
        //verificamos si el controlador especifique existe
        if(file_exists($path_controller)){
            //creamos una instancia de dicha controlador
            require_once $path_controller;
            $controller_name = '\\App\\Controllers\\'.$url[0] . 'Controller';
            $controller = new $controller_name();

            //si la cantidad de elementos del array es >=2
            //entonces se ha especificado un controlador y una accion
            $size =count($url);

            if ($size >= 2) {
                //verificamos que la accion especificada por el usuario exista en el cotrolador
                if (method_exists($controller, $url[1])) {
                    //verificar si existen parametros
                    if ($size >= 3) {
                        // al menos el usuario a especificado un parametro

                        //capturamos los parametrosintegrados en un array"param"
                        $param = [];
                        for ($i=2; $i <$size; $i++){
                            array_push($param, $url[$i]);
                        }
                        //lamamos al controlador, su accion y especificamos los parametros
                        $controller->{$url[1]}($param);
                    } else {
                        // El usuario no ha especificado parametros entoces llamamos 
                        //accion sin parametros
                        $controller->{$url[1]}();
                    }
                    
                } else {
                    echo "el metodo de acción {$url[1]} no existe";
                }
                
            } else {
                //cuando el usuario no especifico ninguna accion
                //lamamos de manera predeterminada el metodo inex
                $controller->index();
            }
            
            //echo "El controlador {$url[0]} existe";
        }else{
            echo "El controlador {$url[0]} no existe";
        }
    }
}
