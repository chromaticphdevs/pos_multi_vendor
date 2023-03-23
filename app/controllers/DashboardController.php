<?php
	class DashboardController extends Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->itemModel = model('ItemModel');
			$this->userModel = model('userModel');
			$this->keywordModel = model('KeywordModel');
			_requireAuth();
		}

		public function index()
		{
			$this->data['page_title'] = 'Dashboard';
			return $this->view('dashboard/index', $this->data);
		}
	}