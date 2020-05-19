<div class="container">
	<div class="row"><br></div>
	<div class="col-xs-12">
		<?php
		if(!empty($success_msg)){
			echo '<div class="alert alert-success">'.$success_msg.'</div>';
		}elseif(!empty($error_msg)){
			echo '<div class="alert alert-danger">'.$error_msg.'</div>';
		}
		?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo $action; ?> Championship <a href="<?php echo site_url('worldchamps/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">

						<div class="form-group">
							<label for="title">Event Name</label>
							<input type="text" class="form-control" name="Name" id="Name" placeholder="Add event name" value="<?php echo !empty($post['Name'])?$post['Name']:''; ?>">
							<?php echo form_error('Name','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<div class="form-group">
							<label for="title">Country</label>
							<?php echo form_dropdown('country_idcountry', $country, $vybrana_krajina, 'class="form-control"'); ?>
							<?php echo form_error('country_idcountry','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<input type="submit" name="postSubmit" class="btn btn-primary" value="Send"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
