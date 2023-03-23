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

		public function getAll($params = []) {
			extract(parent::queryParameterExtractor($params));

			$this->db->query(
				"SELECT * FROM {$this->table} as branch 
					LEFT JOIN companies as company 
					ON company.id = branch.company_id
					{$where} {$order} {$limit}"
			);

			return $this->db->resultSet();
		}

		public function get($id) {
			return $this->getAll([
				'where' => [
					'branch.id' => $id
				]
			])[0] ?? false;
		}


	}