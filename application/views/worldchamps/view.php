<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('worldchamps/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID_worldchamps:</label>
					<p><?php echo !empty($world_champs['idWorldChamps'])? $world_champs['idWorldChamps']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Name:</label>
					<p><?php echo !empty($world_champs['Name'])? $world_champs['Name']:''; ?></p>
				</div>
				<div class="form-group">
					<label>ID_Country:</label>
					<p><?php echo !empty($world_champs['country_idcountry'])? $world_champs['country_idcountry']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
