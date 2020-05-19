<div class="container">
	<?php if(!empty($success_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-success"><?php echo $success_msg; ?></div>
		</div>
	<?php }elseif(!empty($error_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-danger"><?php echo $error_msg; ?></div>
		</div>
	<?php } ?>
	<div class="row">
		<h1>List of championships</h1>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Add championship <a href="<?php echo site_url('worldchamps/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="10%">ID_WorldChamps</th>
						<th width="25%">Name</th>
						<th width="25%">ID_Country</th>
						<th width="10%">Akcie</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($world_champs)): foreach($world_champs as $world_champs): ?>
						<tr>
							<td><?php echo '#'.$world_champs['idWorldChamps']; ?></td>
							<td><?php echo $world_champs['Name']; ?></td>
							<td><?php echo $world_champs['country_idcountry']; ?></td>
							<td>
								<a href="<?php echo site_url('WorldChamps/view/'.$world_champs['idWorldChamps']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('WorldChamps/edit/'.$world_champs['idWorldChamps']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('WorldChamps/delete/'.$world_champs['idWorldChamps']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">No events</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
