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

		public function create() {
			if(isSubmitted()) {
				$post = request()->posts();
				$this->model->createOrUpdate($post);
			}
			$this->productForm->setValue('company_id', 1);
			$this->data['productForm'] = $this->productForm;
			return $this->view('product/create', $this->data);
		}
	}