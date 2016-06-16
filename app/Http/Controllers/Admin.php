<?php

namespace App\Http\Controllers;

use Lib\Http\Controller;
use Lib\Http\Responses\HtmlResponse;

class Admin extends Controller{


	public function index(){
		$data = [
			'templates' => file_get_contents(ROOT . '/resources/admin/views/templates.html'),
			'assets' => json_decode(file_get_contents(ROOT . '/resources/admin/assets.json')),
			'manifest' => json_decode(file_get_contents(ROOT . '/resources/admin/rev-manifest.json'), true)
		];
		$template = 'Views/admin/layout';

		return $this->render($template, $data);
	}

}