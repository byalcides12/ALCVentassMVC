<?php
namespace Libs;

use PhpParser\Builder\Function_;

class Controller
{
    protected $template;
    protected $dao;

    public function renderView(string $view, $data = null)
    {
        require_once '../app/views/' . $view . '.phtml';
    }

    public function loadDirectoryTemplate(string $directory)
    {
        $this->template = new \League\Plates\Engine(MAINPATH . 'app/views/' . $directory);
        $this->template->setFileExtension('phtml');
    }

    public function loadDao(string $daoName)
    {
        $classDao = "App\\Daos\\" . $daoName . "DAO";
        $this->dao = new $classDao();
    }
}