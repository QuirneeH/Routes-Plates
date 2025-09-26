<?php

namespace App\Http;

class ErrorController
{
    private int $code;
    private string $uri;

    public function __construct(int $code, array $infos = [])
    {
        $this->code = $code;
        
        $this->uri = $infos['url'];

        $this->findError($code);
    }

    private function findError(int $code)
    {
        switch ($code) {
            case '404':
                if(!isset($this->uri)) {
                    echo("<h2>Rota não definida</h2>");
                    break;
                } else {
                    echo("<h2>Rota <b>$this->uri</b> não encontrada</h2>");
                    break;
                }
        }
    }
}