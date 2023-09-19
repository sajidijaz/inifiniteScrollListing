<?php

class Migrate extends CI_Controller
{
	public function index(): void
	{
		$this->load->library('migration');
		if ($this->migration->current() === FALSE)
		{
			show_error($this->migration->error_string());
		}
		echo "Migrated successfully";
	}

}
