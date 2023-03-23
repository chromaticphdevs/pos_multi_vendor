<?php 
	use Form\CompanyForm;
	load(['CompanyForm'],FORMS);

	class CompanyController extends Controller
	{	
		public function __construct() {
			parent::__construct();
			$this->companyModel = model('CompanyModel');
			$this->companyForm = new CompanyForm();			
		}

		public function index() {

		}

		public function create() {
			if(isSubmitted()) {
				$post = request()->posts();

				$this->companyModel->createOrUpdate($post);
			}
			$this->data['companyForm'] = $this->companyForm;
			return $this->view('company/create', $this->data);
		}

		public function show() {

		}

		public function edit() {

		}
	}