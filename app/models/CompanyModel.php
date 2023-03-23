<?php 

	class CompanyModel extends Model
	{
		public $table = 'companies';
		public $_fillables = [
			'company_name',
			'nature_of_business'
		];

		public function createOrUpdate($companyData, $id = null) {
			$data = parent::getFillablesOnly($companyData);

			if(is_null($id)) {
				return parent::store($data);
			} else {
				return parent::update($data, $id);
			}
		}

		public function getAll($params = []) {
			extract(parent::queryParameterExtractor($params));
			$this->db->query(
				"SELECT * FROM {$this->table}
					{$where}{$order}{$limit}"
			);
			return $this->db->resultSet();
		}
	}