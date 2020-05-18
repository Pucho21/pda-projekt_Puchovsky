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
		<h1>List of events</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Events <a href="<?php echo site_url('events/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="20%">ID</th>
						<th width="30%">Event</th>
						<th width="20%">Action</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($events)): foreach($events as $events): ?>
						<tr>
							<td><?php echo '#'.$events['idEvents']; ?></td>
							<td><?php echo $events['events']; ?></td>
							<td>
								<a href="<?php echo site_url('events/view/'.$events['idEvents']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('events/edit/'.$events['idEvents']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('events/delete/'.$events['idEvents']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">No events, add some</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
