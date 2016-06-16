<?php

namespace Lib\Views;

class PhpView implements ViewContract {
	
	public function render(string $template, array $data): string
	{
		ob_start();
		extract($data);
		include APP . '/' . $template . '.php';
		$output = ob_get_contents();
		ob_end_clean();
		
		return $output;
	}
	
}