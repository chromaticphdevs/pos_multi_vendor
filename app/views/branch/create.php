<?php build('content')?>
	<div class="col-md-5 mx-auto">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Create Branch</h4>
			</div>

			<div class="card-body">
				<?php echo $branchForm->getForm()?>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>