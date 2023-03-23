<?php 
	use Form\BranchForm;
	load(['BranchForm'], FORMS);

	class BranchController extends Controller
	{	
		public function __construct() {
			parent::__construct();
			$this->branchForm = new BranchForm();
			$this->model = model('BranchModel');
		}

		public function create() {
			if(isSubmitted()) {
				$post = request()->posts();
				$this->model->createOrUpdate($post);
			}
			$this->data['branchForm'] = $this->branchForm;
			return $this->view('branch/create', $this->data);
		}
	}