<?php

namespace App\Http\Controllers;

use App\Data\Models\Copy;
use App\Data\Repositories\CopyRepository;
use Lib\Http\Controller;
use Lib\Http\ResponseHandler;
use Lib\Http\Responses\HtmlResponse;
use Lib\Http\Responses\JsonResponse;

class Home extends Controller{

    public function index(){

        $data = [
            'templates' => file_get_contents(ROOT . '/resources/views/templates.html'),
            'copy' => CopyRepository::getForPage(Copy::PAGE_SERVING_INDEX, getContainer()->getLanguage()),
            'assets' => json_decode(file_get_contents(ROOT . '/resources/assets.json'))
        ];
        $template = 'Views/layout';
        
        return $this->render($template, $data);
    }
    

    public function user($name){

//        dd($this->getRequest()->inputQuery('name');
        $post_name = $this->getRequest()->inputPost('vote');


        return new HtmlResponse('hello world from '.$name . ' ' . $post_name, ResponseHandler::HTTP_CONFLICT);
    }
    
    public function page($id){
        return new JsonResponse(['success' => true, 'id' => $id]);
    }

}