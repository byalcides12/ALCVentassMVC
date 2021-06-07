<?php
namespace App\Controllers;

use App\Daos\CategoriaDAO;
use Libs\Controller;
use stdClass;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->loadDirectoryTemplate('categoria');
        $this->loadDao('Categoria');
    }

    public function index()
    {
        $data = $this->dao->getAll(true);
        echo $this->template->render('index', ['data' =>$data]);
    }

    public function detail($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        $data = $this->dao->get($id);
        echo $this->template->render('detail', ['data' => $data]);
    }

    public function save()
    {
        $obj = new stdClass();

        $obj->codcategoria = isset($_POST['codcategoria'])? $_POST['codcategoria'] : 0;
        $obj->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $obj->descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

        if (isset($_POST['Estado'])) {
            if ($_POST['Estado'] == 'on') {
                $obj->estado = true;
            } else {
                $obj->estado = false;
            }
        } else {
            $obj->estado = false;
        }
        
        if($obj->codcategoria > 0){
            $this->dao->update($obj);
        }else{
            $this->dao->create($obj);
        }
        header('Location:' . URL . 'categoria/index');
    }

    public function delete()
    {
        
    }
}