<?php

namespace Lib\Views;

interface ViewContract{
	
	const DI = 'view';
	
	public function render(string $template, array $data): string;
	
}