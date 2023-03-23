<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Add Product to branch</h4>
		</div>

		<div class="card-body">
			<h4 class="card-title">Product Listing</h4>

			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<th>#</th>
						<th>SKU</th>
						<th>Product Name</th>
						<th>Action</th>
					</thead>

					<tbody>
						<?php foreach($products as $key => $row) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->sku?></td>
								<td><?php echo $row->product_name?></td>
								<td>
									<?php echo wLinkDefault(_route('branch-product:add', $branch->id, [
										'productID' => seal($row->id)
									]), 'Add Product', ['icon' => 'plus-circle'])?>
								</td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endbuild()?>

<?php loadTo()?>