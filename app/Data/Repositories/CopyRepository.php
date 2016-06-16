<?php

namespace App\Data\Repositories;

use App\Helpers\CopyHelper;
use DatabaseMeta\CopyQuery;

class CopyRepository extends CopyQuery{


	public function forPage(string $page, string $lang): self
	{
		return $this->filterByPage($page)
			->filterByLang($lang);
	}

	public static function getForPage(string $page, string $lang): CopyHelper{		
		$results = self::create()->forPage($page, $lang)
			->find();
		return new CopyHelper($results->toKeyValue('slug', 'value'));
	}

}