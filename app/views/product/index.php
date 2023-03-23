<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Products</h4>
			<?php echo wLinkDefault(_route('product:create'),'Create product', [
				'icon' => 'plus-circle'
			])?>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<th>#</th>
						<th>SKU</th>
						<th>Product Name</th>
						<th>Company Name</th>
						<th>Action</th>
					</thead>

					<tbody>
						<?php foreach($products as $key => $row) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->sku?></td>
								<td><?php echo $row->product_name?></td>
								<td><?php echo $row->company_name?></td>
								<td>
									<?php echo wLinkDefault(_route('product:show', $row->id), 'Show', [
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
<?php endbuild()?>
<?php loadTo()?>