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
		<h1>Zoznam reprezentantov</h1>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Pridať borca <a href="<?php echo site_url('representative/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="10%">ID_Repre</th>
						<th width="25%">Full Name</th>
						<th width="25%">ID_Country</th>
						<th width="10%">Country</th>
						<th width="10%">Akcie</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($repre)): foreach($repre as $znamka): ?>
						<tr>
							<td><?php echo '#'.$znamka['idRepresentative']; ?></td>
							<td><?php echo $znamka['cele_meno']; ?></td>
							<td><?php echo $znamka['idcountry']; ?></td>
							<td><?php echo $znamka['country']; ?></td>
							<td>
								<a href="<?php echo site_url('representative/view/'.$znamka['idRepresentative']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('representative/edit/'.$znamka['idRepresentative']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('representative/delete/'.$znamka['idRepresentative']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadny borci</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
