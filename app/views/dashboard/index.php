<?php build('content')?>
<?php Flash::show()?>
<div class="row">
	<div class="col-md-8">
		<?php echo wLinkDefault('https://pos.breakthrough-e.com/index.php', 'Open POS', [
			'target' => '_blank',
			'icon' => 'arrow-right-circle'
		])?>
	</div>
</div>
<?php endbuild()?>
<?php loadTo()?>