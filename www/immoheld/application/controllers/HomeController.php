<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('House', 'house');
		$this->load->helper('validator_helper');
	}

	public function index(): void
	{
		$data['title'] = 'Immoheld Infinite Scroll Listing';
		$data['columns'] = ['Address', 'Price', 'Size'];
		$data['viewFile'] = $this->load->view('pages/index', $data, true);
		$this->load->view('template', $data);
	}

	public function getHouses(): void
	{
		try {
			$isScroll = filter_var($this->input->get('isScroll'), FILTER_VALIDATE_BOOLEAN);
			$filters = $this->input->post('filters', true);
			if (!filterValidate($filters)) {
				$records = [];
			} else {
				$page = $this->input->get('page') ? $this->input->get('page') : 1;
				$limit = 10;
				$offset = ($page - 1) * $limit;
				$sortBy = $this->input->get('sortBy');
				$sortOrder = $this->input->get('sortOrder');
				$records = $this->house->getHouses($limit, $offset, $sortBy, $sortOrder, $filters);
			}
			$rows = $this->load->view('partials/rows', ['records' => $records], true);
			$response = ['error' => false, 'rows' => $isScroll && empty($records) ? null : $rows];
		} catch (\Exception $e) {
			$response = ['error' => true, 'rows' => null];
		}
		echo \json_encode($response);
	}

}
