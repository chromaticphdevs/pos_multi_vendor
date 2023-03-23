<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Branches</h4>
			<?php echo wLinkDefault(_route('branch:create'), 'Add new Branch', [
				'icon' => 'plus-circle'
			])?>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<th>#</th>
						<th>Branch</th>
						<th>Company Name</th>
						<th>Action</th>
					</thead>

					<tbody>
						<?php foreach($branches as $key => $row):?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->branch_name?></td>
								<td><?php echo $row->company_name?></td>
								<td>
									<?php echo wLinkDefault(_route('branch:show', $row->id), 'Show', [
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