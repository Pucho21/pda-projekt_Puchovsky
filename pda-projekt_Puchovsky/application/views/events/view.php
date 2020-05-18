<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail <a href="<?php echo site_url('events/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID_Event:</label>
					<p><?php echo !empty($events['idEvents'])?$events['idEvents']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Event:</label>
					<p><?php echo !empty($events['events'])?$events['events']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
