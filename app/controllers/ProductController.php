<?php 
	use Form\ProductForm;
	load(['ProductForm'],FORMS);

	class ProductController extends Controller
	{
		public function __construct() {
			parent::__construct();
			$this->productForm = new ProductForm();
			$this->model = model('ProductModel');
		}

		public function index() {
			if(isVendor()) {
				$this->data['products'] = $this->model->getAll();
			} else {
				$this->data['products'] = $this->model->getAll([
					'where' => [
						'company_id' => $this->data['whoIs']->company_id
					]
				]);
			}
			return $this->view('product/index', $this->data);
		}

		public function create() {
			if(isSubmitted()) {
				$post = request()->posts();
				$this->model->createOrUpdate($post);

				Flash::set("Product Created");

				return redirect(_route('product:index'));
			}
			$this->productForm->setValue('company_id',  $this->data['whoIs']->company_id);
			$this->data['productForm'] = $this->productForm;
			return $this->view('product/create', $this->data);
		}

		public function show($id) {
			$this->data['product'] = $this->model->get($id);
			return $this->view('product/show', $this->data);
		}
	}