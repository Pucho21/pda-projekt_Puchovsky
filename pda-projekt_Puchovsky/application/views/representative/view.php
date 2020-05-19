<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('representative/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($representative['idRepresentative'])? $representative['idRepresentative']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Name:</label>
					<p><?php echo !empty($representative['Name'])? $representative['Name']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Surname:</label>
					<p><?php echo !empty($representative['Surname'])? $representative['Surname']:''; ?></p>
				</div>
				<div class="form-group">
					<label>ID_Country:</label>
					<p><?php echo !empty($representative['country_idcountry'])? $representative['country_idcountry']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Country:</label>
					<p><?php echo !empty($representative['country'])? $representative['country']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
