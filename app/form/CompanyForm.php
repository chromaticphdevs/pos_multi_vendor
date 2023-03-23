<?php 

	namespace Form;
	use Core\Form;
	load(['Form'], CORE);

	class CompanyForm extends Form{

		public function __construct(){
			parent::__construct();

			$this->addName();
			$this->addNatureOfBusiness();
			$this->customSubmit();
		}

		public function addName() {
			$this->add([
				'type' => 'text',
				'name' => 'company_name',
				'required' => 'true',
				'class' => 'form-control',
				'options' => [
					'label' => 'Company Name'
				]
			]);
		}

		public function addNatureOfBusiness() {
			$this->add([
				'type' => 'text',
				'name' => 'nature_of_business',
				'required' => 'true',
				'class' => 'form-control',
				'options' => [
					'label' => 'Nature of Business'
				]
			]);
		}
	}