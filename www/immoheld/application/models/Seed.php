<?php

class Seed extends CI_Model
{
	public function bulkInsert(array $data): void
	{
		$this->db->insert_batch('houses', $data);
	}
}
