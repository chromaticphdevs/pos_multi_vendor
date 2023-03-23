<?php 

	class BranchModel extends Model
	{
		public $table = 'branches';
		public $_fillables = [
			'company_id',
			'branch_code',
			'branch_name',
			'login_key'
		];
		public function createOrUpdate($saveData, $id = null) {
			$data = parent::getFillablesOnly($saveData);

			if(is_null($id)) {
				return parent::store($data);
			}else{
				return parent::update($data, $id);
			}
		}
	}