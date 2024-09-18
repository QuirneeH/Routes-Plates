<?php

namespace App\Core;

use Exception;
use League\Plates\Engine;

class View
{
    /** 
     * Lista de instancias dos Controladores
     */
    private static array $instances = [];

    /**
     * Diretório padrão dos arquivos de *view*
     */
    private const DIRECTORY_VIEW = "resource" . DIRECTORY_SEPARATOR . "views";
    
    /**
     * Método para renderizar a view e passar os parametros para a exibição na *view*
     * 
     * @use League\Plates\Engine
     * @param string $diretory Pasta qual o arquivo *view* pertence
     * @param array $datas paramentros para serem utilizados nos arquivos *view*
     */
    public static function render(string $diretory, array $datas = [])
    {
        $path = self::DIRECTORY_VIEW . DIRECTORY_SEPARATOR . $diretory;

        if(!file_exists($path . ".php")) 
            throw new Exception("View \"<b>{$diretory}</b>\" não existe");

        $view = DIRECTORY_SEPARATOR . $diretory;

        require('app/helper/instances.php');

        $templates = new Engine(self::DIRECTORY_VIEW);
        $templates->addData(['instance' => self::$instances]);
        echo $templates->render($view, $datas);
    }

    private static function addInstance(string $instanceKey, $instanceClass)
    {
        if(!isset(self::$instances[$instanceKey]))
            self::$instances[$instanceKey] = $instanceClass;
    }
}