<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('filterValidate')) {
	function filterValidate(array $filter): bool
	{
		if ((!empty($filter['size']) && !is_numeric($filter['size']))
			|| (!empty($filter['price']) && !is_numeric($filter['price']))) {
			return false;
		}
		return true;
	}
}
