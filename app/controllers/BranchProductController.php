<?php 
	use Form\BranchProductForm;
	load(['BranchProductForm'],FORMS);;

	class BranchProductController extends Controller
	{

		public function __construct() {
			parent::__construct();
			$this->model = model('BranchProductModel');
			$this->productModel = model('ProductModel');
			$this->branchModel = model('branchModel');

			$this->branchProductForm = new BranchProductForm();
		}

		public function index() {

		}

		//selection of product
		public function create($branchID) {
			$this->data['products']  = $this->productModel->getAll([
				'where' => [
					'company_id' => whoIs('company_id')
				]
			]);

			$this->data['branch'] = $this->branchModel->get($branchID);

			return $this->view('branch_product/create', $this->data);
		}

		public function addItem($branchID) {
			$req = request()->inputs();

			if(!isset($req['productID'])) {
				echo die("Invalid Request");
			}

			if(isSubmitted()) {
				$post = request()->posts();
				$this->model->addItem($post);

				return redirect(_route('branch:show',$post['branch_id']));
			}

			$productID = unseal($req['productID']);

			$product = $this->productModel->get($productID);
			$branch = $this->branchModel->get($branchID);

			$this->branchProductForm->setValue('branch_id', $branchID);
			$this->branchProductForm->setValue('company_id', $branch->company_id);
			$this->branchProductForm->setValue('product_id', $productID);


			$this->branchProductForm->setValue('product_name', $branch->branch_name);
			$this->branchProductForm->setValue('product_sku', $product->sku);
			$this->branchProductForm->setValue('branch_name', $product->product_name);


			$this->data['form'] = $this->branchProductForm;

			return $this->view('branch_product/add_item', $this->data);
		}
	}