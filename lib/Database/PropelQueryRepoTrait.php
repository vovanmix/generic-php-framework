<?php

namespace Lib\Database;

use Propel\Runtime\ActiveQuery\Criteria;

trait PropelQueryRepoTrait{
	
	public static function create($modelAlias = null, Criteria $criteria = null)
	{
		if ($criteria instanceof static) {
			return $criteria;
		}
		$query = new static();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}

		return $query;
	}
	
}