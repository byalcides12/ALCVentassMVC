<?php
namespace App\Controllers;

use App\Daos\CategoriaDAO;
use GUMP;
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
        $valid_data = $this->valida($_POST);
        
        $status = $valid_data['status'];
        $data = $valid_data['data'];

        if($status ===true){

            $obj = new stdClass();
            $obj->IdCategoria = isset($_POST['idcategoria']) ? $_POST['idcategoria'] : 0;
            $obj->Nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $obj->Descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

            if (isset($_POST['estado'])) {
                if ($_POST['estado'] == 'on') {
                    $obj->Estado = true;
                } else {
                    $obj->Estado = false;
                }
            } else {
                $obj->Estado = false;
            }

            if ($obj->IdCategoria > 0) {
                $rpta = $this->dao->update($obj);
            } else {
                $rpta = $this->dao->create($obj);
            }

            if ($rpta) {
                $response = [
                    'success' =>1,
                    'message' => 'Categoria guardada correctamente',
                    'redirection' => URL . 'categoria/index'
                ];
            }else{
                $response = [
                    'success' => 0,
                    'message' => 'Error al guardar los datos',
                    'redirection' => ''
                ];
            }
        }else{
            $response = [
                'success' => -1,
                'message' =>$data,
                'redirection' => ''
            ];
        }
        echo json_encode ($response);
        
        //header('Location:' . URL . 'categoria/index');
    }

    public function delete($param = null)
    {
        $id = isset($param[0]) ? intval($param[0]): 0;

        if ($id > 0) {
            $this->dao->delete($id);
        }
        header('Location:' . URL . 'categoria/index');
    }
    public function valida($datos)
    {
        $gump =new GUMP('es');

        $gump->validation_rules([
            'nombre' => 'required|max_len,20',
            'descripcion' => 'min_len,5|max_len,100'
        ]);

        $valid_data = $gump->run($datos);

        if($gump->errors()){
            $response = [
                'status' => false,
                'data' => $gump->get_errors_array()
            ];
        }else{
            $response = [
                'status' => true,
                'data' => $valid_data
            ];
        }

        return $response;
    }
}