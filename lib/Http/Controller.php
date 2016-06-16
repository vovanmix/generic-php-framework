<?php

namespace Lib\Http;

use App\Infrastructure\Container;
use Lib\Http\Responses\HtmlResponse;
use Lib\Views\ViewContract;

class Controller {

    /**
     * @param string $name
     * @return object
     */
    public function get($name){
        return getContainer()->di()->get($name);
    }

    /**
     * @return ServerRequest
     */
    public function getRequest(){
        return getContainer()->getRequest();
    }
    
    
    public function render(string $template, array $data): HtmlResponse{
        $template = $this->get(ViewContract::DI)->render($template, $data);
        
        return new HtmlResponse($template);
    }
    
}