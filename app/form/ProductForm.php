<?php 
	namespace Form;
	use Core\Form;
	load(['Form'], CORE);

	class ProductForm extends Form
	{
		public function __construct() {
			parent::__construct();

			$this->addCompany();
			$this->addSku();
			$this->addProductName();
			$this->customSubmit();
		}

		public function addCompany() {
			$this->add([
				'type' => 'hidden',
				'name' => 'company_id',
				'required' => 'true',
				'options' => [
					'label' => 'SKU'
				],
				'class' => 'form-control'
			]);
		}

		public function addSku() {
			$this->add([
				'type' => 'text',
				'name' => 'sku',
				'required' => 'true',
				'options' => [
					'label' => 'SKU'
				],
				'class' => 'form-control'
			]);
		}

		public function addProductName() {
			$this->add([
				'type' => 'text',
				'name' => 'product_name',
				'required' => 'true',
				'options' => [
					'label' => 'Product Name'
				],
				'class' => 'form-control'
			]);
		}
	}