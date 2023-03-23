<?php 

	class ProductModel extends Model
	{
		public $table = 'products';
		public $_fillables = [
			'company_id',
			'sku',
			'product_name'
		];

		public function createOrUpdate($saveData, $id = null) {
			$data = parent::getFillablesOnly($saveData);

			if(is_null($id)) {
				return parent::store($data);
			}else{
				return parent::update($data,$id);
			}
		}

		public function getAll($params = []) {
			$where = null;
			$order = null;
			$limit = null;

			if(!empty($params['where'])) {
				$where = " WHERE ".parent::conditionConvert($params['where']);
			}

			if(!empty($params['order'])) {
				$order = " ORDER BY {$params['order']}";
			}

			if(!empty($params['limit'])) {
				$limit = " LIMIT {$params['limit']}";
			}

			$this->db->query(
				"SELECT product.*,company_name FROM {$this->table} as product 
					LEFT JOIN companies as company
					on company.id = product.company_id
					{$where}{$order}{$limit}"
			);

			return $this->db->resultSet();
		}


		public function get($id) {

			return $this->getAll([
				'where' => [
					'product.id' => $id
				]
			])[0] ?? false;
		}
	}