<?php 
	namespace Form;
	use Core\Form;
	load(['Form'],CORE);

	class BranchForm extends Form
	{
		public function __construct() {
			parent::__construct();
			$this->companyModel = model('CompanyModel');

			$this->addCompany();
			$this->addCode();
			$this->addName();
			$this->customSubmit();
		}

		public function addCompany() {
			$companies = $this->companyModel->all();

			$companies = arr_layout_keypair($companies, ['id','company_name']);
			$this->add([
				'name' => 'company_id',
				'type' => 'select',
				'options' => [
					'label' => 'Company',
					'option_values' => $companies
				],
				'class' => 'form-control',
				'required' => true
			]);
		}

		public function addCode() {
			$this->add([
				'name' => 'branch_code',
				'type' => 'text',
				'options' => [
					'label' => 'Branch Code'
				],
				'class' => 'form-control',
				'required' => true
			]);
		}

		public function addName() {
			$this->add([
				'name' => 'branch_name',
				'type' => 'text',
				'options' => [
					'label' => 'Branch Name'
				],
				'class' => 'form-control',
				'required' => true
			]);
		}
	}