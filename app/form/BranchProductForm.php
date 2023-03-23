<?php 

	namespace Form;
	use Core\Form;

	load(['Form'],CORE);

	class BranchProductForm extends Form {

		public function __construct(){
			parent::__construct();
			$this->addSKU();
			$this->addProductName();
			$this->addBranchName();

			$this->addCompany();
			$this->addBranch();
			$this->addProduct();
			$this->addCostPrice();
			$this->addSellPrice();

			
			$this->customSubmit();
		}

		public function addCompany() {
			$this->add([
				'type' => 'hidden',
				'name' => 'company_id'
			]);
		}

		public function addBranch() {
			$this->add([
				'type' => 'hidden',
				'name' => 'branch_id'
			]);
		}

		public function addProduct() {
			$this->add([
				'type' => 'hidden',
				'name' => 'product_id'
			]);
		}

		public function addCostPrice() {
			$this->add([
				'type' => 'text',
				'name' => 'cost_price',
				'class' => 'form-control',
				'required' => true,
				'options' => [
					'label' => 'Cost Price'
				]
			]);
		}

		public function addSellPrice() {
			$this->add([
				'type' => 'text',
				'name' => 'sell_price',
				'class' => 'form-control',
				'required' => true,
				'options' => [
					'label' => 'Sell Price'
				]
			]);
		}

		public function addProductName() {
			$this->add([
				'type' => 'text',
				'name' => 'product_name',
				'class' => 'form-control',
				'required' => true,
				'attributes' => [
					'readonly' => true
				],
				'options' => [
					'label' => 'Product Name'
				]
			]);
		}

		public function addBranchName() {
			$this->add([
				'type' => 'text',
				'name' => 'branch_name',
				'class' => 'form-control',
				'required' => true,
				'attributes' => [
					'readonly' => true
				],
				'options' => [
					'label' => 'Branch Name'
				]
			]);
		}

		public function addSKU() {
			$this->add([
				'type' => 'text',
				'name' => 'product_sku',
				'class' => 'form-control',
				'required' => true,
				'attributes' => [
					'readonly' => true
				],
				'options' => [
					'label' => 'SKU'
				]
			]);
		}
	}