<?php

	namespace Form;

	load(['Form'], CORE);
	load(['UserService'],SERVICES);
	use Core\Form;
	use Services\UserService;

	class UserForm extends Form
	{

		public function __construct( $name = null)
		{
			parent::__construct();

			$this->name = $name ?? 'form_user';

			$this->initCreate();
			$this->addCompany();
			$this->addUserType();

			/*personal details*/
			$this->addFirstName();
			$this->addLastName();
			$this->addEmail();
			$this->addPassword();

			$this->addUsername();
			$this->addProfile();
			/*end*/


			$this->addSubmit('');
		}

		public function initCreate()
		{
			$this->init([
				'url' => _route('user:create'),
				'enctype' => true
			]);
		}

		public function addUserIdentification($label = 'User ID')
		{
			$this->add([
				'type' => 'text',
				'name' => 'user_identification',
				'class' => 'form-control',
				'options' => [
					'label' => $label
				],

				'attributes' => [
					'id' => 'student_id',
					'placeholder' => 'User ID'
				]
			]);
		}
		
		public function addFirstName()
		{
			$this->add([
				'type' => 'text',
				'name' => 'firstname',
				'class' => 'form-control',
				'required' => true,
				'options' => [
					'label' => 'First Name'
				],

				'attributes' => [
					'id' => 'firstname',
					'placeholder' => 'Enter First Name'
				]
			]);
		}


		public function addLastName()
		{
			$this->add([
				'type' => 'text',
				'name' => 'lastname',
				'class' => 'form-control',
				'required' => true,
				'options' => [
					'label' => 'Last Name'
				],

				'attributes' => [
					'id' => 'lastname',
					'placeholder' => 'Enter Last Name'
				]
			]);
		}

		public function addGender()
		{
			$this->add([
				'type' => 'select',
				'name' => 'gender',
				'class' => 'form-control',
				'options' => [
					'label' => 'Gender',
					'option_values' => [
						'Male' , 'Female'
					]
				],

				'attributes' => [
					'id' => 'gender',
				]
			]);
		}

		public function addAddress()
		{
			$this->add([
				'type' => 'textarea',
				'name' => 'address',
				'class' => 'form-control',
				'options' => [
					'label' => 'Address',
				],

				'attributes' => [
					'id' => 'address',
					'rows' => 3
				]
			]);
		}

		public function addPhoneNumber()
		{
			$this->add([
				'type' => 'text',
				'name' => 'phone',
				'class' => 'form-control',
				'options' => [
					'label' => 'Phone Number',
				],

				'attributes' => [
					'id' => 'phone',
					'placeholder' => 'Eg. 09xxxxxxxxx'
				]
			]);
		}

		public function addEmail()
		{
			$this->add([
				'type' => 'email',
				'name' => 'email',
				'class' => 'form-control',
				'options' => [
					'label' => 'Email',
				],

				'required' => true,
				'attributes' => [
					'id' => 'email',
					'placeholder' => 'Enter Valid Email'
				]
			]);
		}

		public function addUsername()
		{
			$this->add([
				'type' => 'text',
				'name' => 'username',
				'class' => 'form-control',
				'required' => true,
				'options' => [
					'label' => 'Username',
				],

				'attributes' => [
					'id' => 'username',
					'placeholder' => 'Enter Username'
				]
			]);
		}

		public function addPassword()
		{
			$this->add([
				'type' => 'password',
				'name' => 'password',
				'class' => 'form-control',
				'required' => true,
				'options' => [
					'label' => 'Password',
				],

				'attributes' => [
					'id' => 'password'
				]
			]);
		}

		public function addUserType()
		{
			$this->add([
				'type' => 'select',
				'name' => 'user_type',
				'class' => 'form-control',
				'required' => true,
				'options' => [
					'label' => 'User Type',
					'option_values' => UserService::getTypes()
				],
				'attributes' => [
					'id' => 'userType'
				]
			]);
		}

		public function addProfile()
		{
			$this->add([
				'type' => 'file',
				'name' => 'profile',
				'class' => 'form-control',
				'options' => [
					'label' => 'Profile Picture',
				],

				'attributes' => [
					'id' => 'profile'
				]
			]);
		}

		public function addSubmit()
		{
			$this->add([
				'type' => 'submit',
				'name' => 'submit',
				'class' => 'btn btn-primary',
				'attributes' => [
					'id' => 'id_submit'
				],

				'value' => 'Save user'
			]);
		}

		public function addCompany()
		{
			if(!isset($this->companyModel)) {
				$this->companyModel = model('CompanyModel');
			}
			$companies = $this->companyModel->getAll();
			$companies_array = arr_layout_keypair($companies, ['id', 'company_name']);
			$this->add([
				'type' => 'select',
				'name' => 'company_id',
				'class' => 'form-control',
				'options' => [
					'label' => 'Company',
					'option_values' => $companies_array
				]
			]);
		}
	}