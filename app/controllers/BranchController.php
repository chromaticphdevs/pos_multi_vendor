<?php 
	use Form\BranchForm;
	load(['BranchForm'], FORMS);

	class BranchController extends Controller
	{	
		public function __construct() {
			parent::__construct();
			$this->branchForm = new BranchForm();
			$this->model = model('BranchModel');
			$this->branchProductModel = model('BranchProductModel');
		}

		public function index() {
			if(isVendor()) {
				$this->data['branches'] = $this->model->getAll();
			} else {
				$this->data['branches'] = $this->model->getAll([
					'where' => [
						'company_id' => $this->data['whoIs']->company_id
					]
				]);
			}
			return $this->view('branch/index', $this->data);
		}

		public function create() {
			if(isSubmitted()) {
				$post = request()->posts();
				$this->model->createOrUpdate($post);
				Flash::set("Branch created");
				return redirect(_route('branch:show', $this->model->retVal('id')));
			}

			if(!isVendor()) {
				$this->branchForm->add([
					'name' => 'company_id',
					'type' => 'hidden',
					'value' => $this->data['whoIs']->company_id
				]);
			}
			$this->data['branchForm'] = $this->branchForm;
			return $this->view('branch/create', $this->data);
		}

		public function show($id) {
			$branch = $this->model->get($id);
			$this->data['branch'] = $branch;
			$this->data['products'] = $this->branchProductModel->getAll([
				'where' => [
					'branch_id' => $id
				]
			]);
			return $this->view('branch/show', $this->data);
		}
	}