<?php

namespace App\Core;

use App\Http\ErrorController;
use Exception;

class Router
{
    /** 
     * Lista de rotas a serem adicionadas
     */
    private array $routes = [];
    
    private string $groupName = "/";
    private string $url;
    // private string $request;
    private string $controller = "";

    /**
     * Adiciona um Grupo de URL
     * 
     * @param string $prefix Nome(URL) desse Grupo 
     * @param string $controller Controlador responsável por este Grupo
     * @param callable $callback Chamadas de funções presentes no Grupo
     * @return void
     */
    public function group(string $prefix, string $controller, callable $callback)
    {
        if($prefix !== "/") $this->groupName = "/" . $prefix;

        $this->controller = $controller;

        call_user_func($callback);
    }

     /**
     * Adiciona uma nova Rota
     * 
     * @param string $url URL a ser a adicionada 
     * @param string $method Método a ser execultado
     * @param string $controller Controlador responsável por esse Rota
     * @param string $middleware Regras e Permissões do uso desta URL
     * @return void
     */
    public function add(string $url, string $method, string $controller = "")
    {
        if($controller != "") $this->controller = $controller;
        
        if($url === "/") $url = null;
        
        $urlName = $this->groupName . $url;
        
        $this->routes[$urlName] = [
            "controller" => $this->controller,
            "method" => $method,
        ];
    }

     /**
     * Inicializa as Rotas e seus Métodos adicionados
     * 
     * @see App\Core\Router::add
     * @throws \Exception
     * @return void
     */
    public function init()
    {
        $url = '/';
        $controller = "HomeController";
        $method = "index";

        // Armazena os volores atuais que estão na URL após a "/"
        $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        /**
         * Config expecificamente por causa do server XAMPP
         */
        $request_uri = substr($request_uri, 7);
        
        // Substitui pela URL atual caso exista alteração
        if(!isset($request_uri)) 
            throw new Exception("", 404);
        else
            $url .= trim($request_uri, '/');

        $routeFound = false;

        foreach($this->routes as $route => $datas) {
            // Armazena e substitui os valores pelos passados via GET
            $pattern = '#^' . preg_replace('/\{([\wÀ-ÿ]+)\}/u', '([^/]+)', $route) . '$#';

            // Verifica se os valores são correspondentes
            if(preg_match($pattern, $url, $matches)) {
                // Formata para o valor original
                $matches = array_map('urldecode', $matches);

                array_shift($matches);
                
                $routeFound = true;

                $controller = $datas['controller'];
                $method = $datas['method'];

                // Faz a chamada do Controller e do Método correspodente a desta Rota
                (new Controller())->call($controller, $method, $matches);
            }   
        }

        if(!$routeFound) {
            (new ErrorController(404, ['url' => $request_uri]));
        }
    }
}