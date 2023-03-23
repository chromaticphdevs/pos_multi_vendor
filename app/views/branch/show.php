<?php build('content')?>
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Branch Preview</h4>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<td>Branch Name</td>
							<td><?php echo $branch->branch_name?></td>
						</tr>

						<tr>
							<td>Company Name</td>
							<td><?php echo $branch->company_name?></td>
						</tr>
					</table>
				</div>

				<?php echo wDivider(30)?>
				<h4>Products</h4>
				<?php echo wLinkDefault(_route('branch-product:create', $branch->id), 'Add Product', [
					'icon' => 'plus-circle'
				])?>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<th>#</th>
							<th>SKU</th>
							<th>Name</th>
							<th>Cost Price</th>
							<th>Sell Price</th>
							<th>Action</th>
						</thead>

						<tbody>
							<?php foreach($products as $key => $row) :?>
								<tr>
									<td><?php echo ++$key?></td>
									<td><?php echo $row->sku?></td>
									<td><?php echo $row->product_name?></td>
									<td><?php echo $row->cost_price?></td>
									<td><?php echo $row->sell_price?></td>
									<td>
										<?php echo wLinkDefault('#', 'Show', [
											'icon' => 'eye'
										])?>
									</td>
								</tr>
							<?php endforeach?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>