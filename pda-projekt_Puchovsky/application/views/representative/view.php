<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('representative/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($znamky['idRepresentative'])? $znamky['idRepresentative']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Full Name:</label>
					<p><?php echo !empty($repre['cele_meno'])? $repre['cele_meno']:''; ?></p>
				</div>
				<div class="form-group">
					<label>ID_Country:</label>
					<p><?php echo !empty($znamky['idcountry'])? $znamky['idcountry']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Country:</label>
					<p><?php echo !empty($znamky['country'])? $znamky['country']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
