<?php 

	class BranchProductModel extends Model
	{
		public $table = 'branch_products';
		public $_fillables = [
			'company_id',
			'branch_id',
			'product_id',
			'cost_price',
			'sell_price',
			'created_at'
		];

		public function addItem($productData) {
			$fillable_datas = parent::getFillablesOnly($productData);
			return parent::store($fillable_datas);
		}

		public function getAll($params = []) {
			extract(parent::queryParameterExtractor($params));
			$this->db->query(
				"SELECT company_name,branch.branch_name,product_name,
				product.sku as sku,
				cost_price,sell_price,
				bp.id as id, bp.company_id, bp.branch_id, bp.product_id

				FROM {$this->table} as bp 
					LEFT JOIN products as product
					ON bp.product_id = product.id 

					LEFT JOIN branches as branch
					ON bp.branch_id = branch.id 

					LEFT JOIN companies as company 
					on company.id = bp.company_id

				{$where} {$order} {$limit}
				"
			);

			return $this->db->resultSet();
		}
	}