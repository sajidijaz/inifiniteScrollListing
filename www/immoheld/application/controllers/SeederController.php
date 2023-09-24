<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeederController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Seed', 'seed');
	}

	public function index(): void
	{
		$data = [];
		for ($i = 0; $i < 50; $i++) {
			$data[] = [
				'address' => $this->generateRandomAddress(),
				'price' => $this->generateRandomPrice(),
				'size' => $this->generateRandomSize()
			];
		}
		$this->seed->bulkInsert($data);
		echo "Executed Successfully";

	}

	private function generateRandomAddress(): string
	{
		$streets = ['123 Main St', '456 Elm St', '789 Oak St', '321 Pine St'];
		$cities = ['New York', 'Los Angeles', 'Chicago', 'Houston'];
		$states = ['NY', 'CA', 'IL', 'TX'];
		$randomStreet = $streets[array_rand($streets)];
		$randomCity = $cities[array_rand($cities)];
		$randomState = $states[array_rand($states)];
		return $randomStreet . ', ' . $randomCity . ', ' . $randomState;
	}

	private function generateRandomPrice(): string
	{
		return number_format(rand(10000, 100000) / 100, 2);
	}

	private function generateRandomSize(): int
	{
		return rand(100, 1000);
	}

}
