<?php build('content') ?>
<div class="col-md-8">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Company Preview</h4>
			<?php echo wLinkDefault(_route('company:create'), 'Add new Company', ['icon' => 'plus-circle'])?>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<td>Company Name</td>
						<td><?php echo $company->company_name?></td>
					</tr>
					<tr>
						<td>Nature Of Business</td>
						<td><?php echo $company->nature_of_business?></td>
					</tr>
				</table>
			</div>

			<?php echo wDivider(70)?>
			<h4>Branches</h4>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<th>#</th>
						<th>Code</th>
						<th>Name</th>
					</thead>

					<tbody>
						<?php foreach($branches as $key => $row) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->branch_code?></td>
								<td><?php echo $row->branch_name?></td>
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