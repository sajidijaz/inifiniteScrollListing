<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class House extends CI_Model {

	private const TABLE = 'houses';

	public function getHouses(int $limit, int $offset, string $sortBy, string $sortOrder, array $filters): array
	{
		$this->db->select('*');
		$this->db->from(self::TABLE);

		// Apply filters
		foreach ($filters as $key => $value) {
			if (!empty($value)) {
				$this->db->where(trim($key), trim($value));
			}
		}
		$this->db->limit($limit, $offset);
		$this->db->order_by($sortBy, $sortOrder);
		$query = $this->db->get();
		return $query->result_array();
	}
}
