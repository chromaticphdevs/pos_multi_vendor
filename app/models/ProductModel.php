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
	}