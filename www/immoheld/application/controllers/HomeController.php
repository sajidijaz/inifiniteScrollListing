<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('House','house');
	}

	public function index(): void
	{
		$data['title'] = 'Immoheld Infinite Scroll Listing';
		$data['viewFile'] = $this->load->view('pages/index', $data, true);
		$this->load->view('template', $data);
	}

	public function getHouses(): void
	{
		$filters = $this->input->post('filters');
		$isScroll = filter_var($this->input->get('isScroll'), FILTER_VALIDATE_BOOLEAN);
		$sortBy = $this->input->get('sortBy');
		$sortOrder = $this->input->get('sortOrder');
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$limit = 10;
		$offset = ($page - 1) * $limit;
		$records = $this->house->getHouses($limit, $offset, $sortBy, $sortOrder, $filters);
		$rows = $this->load->view('partials/rows', ['records' => $records] , true);
		echo \json_encode(['rows' => $isScroll && empty($records) ? null : $rows]);
	}

}
