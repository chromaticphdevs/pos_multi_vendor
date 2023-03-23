<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Product Preview</h4>
		</div>

		<div class="card-body">
			<div class="col-md-5">
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<td>Product Name:</td>
							<td><?php echo $product->product_name?></td>
						</tr>
						<tr>
							<td>Company Name</td>
							<td><?php echo $product->company_name?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>