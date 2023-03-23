<?php 
	use Form\CompanyForm;
	load(['CompanyForm'],FORMS);

	class CompanyController extends Controller
	{	
		public function __construct() {
			parent::__construct();
			$this->model = model('CompanyModel');
			$this->branchModel = model('branchModel');
			$this->companyForm = new CompanyForm();			
		}

		public function index() {
			$this->data['companies'] = $this->model->all();
			return $this->view('company/index', $this->data);
		}

		public function create() {
			if(isSubmitted()) {
				$post = request()->posts();

				$this->model->createOrUpdate($post);
			}
			$this->data['companyForm'] = $this->companyForm;
			return $this->view('company/create', $this->data);
		}

		public function show($id) {
			$this->data['company'] = $this->model->get($id);
			$this->data['branches'] = $this->branchModel->getAll([
				'where' => [
					'company_id' => $id
				]
			]);

			return $this->view('company/show', $this->data);
		}

		public function edit() {

		}
	}