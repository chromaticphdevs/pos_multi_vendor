<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Companies</h4>
			<?php echo wLinkDefault(_route('company:create'), 'Add new Company', ['icon' => 'plus-circle'])?>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<th>#</th>
						<th>Company</th>
						<th>Nature Of Business</th>
						<th>Action</th>
					</thead>

					<tbody>
						<?php foreach($companies as $key => $row) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->company_name?></td>
								<td><?php echo $row->nature_of_business?></td>
								<td>
									<?php echo wLinkDefault(_route('company:show', $row->id), 'Show', ['icon' => 'eye'])?>
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