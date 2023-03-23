<?php 
	load(['UserForm'] , APPROOT.DS.'form');
	load(['BehaviorService'], SERVICES);

	use Form\UserForm;
	use Services\BehaviorService;
	class UserController extends Controller
	{

		public function __construct()
		{
			_requireAuth();
			parent::__construct();
			$this->model = model('UserModel');

			$this->data['page_title'] = ' Users ';
			$this->data['user_form'] = new UserForm();
		}

		public function index()
		{
			$params = request()->inputs();

			if(isVendor()) {
				$this->data['users'] = $this->model->getAll( );
			}else{
				$this->data['users'] = $this->model->getAll([
					'where' => [
						'company_id' => $this->data['whoIs']->company_id
					]
				]);
			}
			return $this->view('user/index' , $this->data);
		}

		public function create()
		{
			$req = request()->inputs();

			if(isSubmitted()) {
				$post = request()->posts();
				$user_id = $this->model->create($post , 'profile');
				if(!$user_id){
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}

				Flash::set('User Record Created');
				if( isEqual($post['user_type'] , 'patient') )
				{
					Flash::set('Patient Record Created');
					return redirect(_route('patient-record:create' , null , ['user_id' => $user_id]));
				}

				return redirect( _route('user:show' , $user_id , ['user_id' => $user_id]) );
			}
			$user_form = new UserForm('userForm');

			if(!isVendor()) {
				$user_form->add([
					'type' => 'hidden',
					'name' =>'company_id',
					'value' => $this->data['whoIs']->company_id
				]);
			}
			$this->data['user_form'] = $user_form;

			return $this->view('user/create' , $this->data);
		}

		public function edit($id)
		{
			if(isSubmitted()) {
				$post = request()->posts();
				$post['profile'] = 'profile';
				$res = $this->model->update($post , $post['id']);

				if($res) {
					Flash::set( $this->model->getMessageString());
					return redirect( _route('user:show' , $id) );
				}else
				{
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}
			}

			$user = $this->model->get($id);

			$this->data['id'] = $id;
			$this->data['user_form']->init([
				'url' => _route('user:edit',$id)
			]);

			$this->data['user_form']->setValueObject($user);
			$this->data['user_form']->addId($id);
			$this->data['user_form']->remove('submit');
			$this->data['user_form']->add([
				'name' => 'password',
				'type' => 'password',
				'class' => 'form-control',
				'options' => [
					'label' => 'Password'
				]
			]);

			$this->data['user'] = $user;

			if(!isEqual(whoIs('user_type'), 'admin'))
				$this->data['user_form']->remove('user_type');

			return $this->view('user/edit' , $this->data);
		}

		public function show($id)
		{
			$user = $this->model->get($id);

			if(!$user) {
				Flash::set(" This user no longer exists " , 'warning');
				return request()->return();
			}

			$this->data['user'] = $user;
			
			return $this->view('user/show' , $this->data);
		}

		public function sendCredential($id)
		{
			$this->model->sendCredential($id);
			Flash::set("Credentials has been set to the user");
			return request()->return();
		}
	}