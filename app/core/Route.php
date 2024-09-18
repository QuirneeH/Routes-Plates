<?php

namespace App\Core;

class Route
{
    private string $uri;
    private string $request;
    public string $controller;
    
    public function __construct(string $uri, string $request, string $controller)
    {
        $this->uri = $uri;
        $this->request = $request;
        $this->controller = $controller;
    }
    
    /**
     * Retorna a URI atual
     */
    public function currentUri(): string
    {
        return $_SERVER['REQUEST_URI'] !== '/' ? rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '/';
    }

    /**
     * Retorna o típo de requisição atual
     */
    public function currentRequest(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * Valida se tanto a URI e o tipo de requisição atuais são semelhantes com passadas por parametro  
     */
    public function match()
    {
        if($this->uri == $this->currentUri() && strtolower($this->request) == $this->currentRequest()) { return $this; }
    }
}