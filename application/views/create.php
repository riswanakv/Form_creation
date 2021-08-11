<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form creation</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
<body>
	<div class="navbar navbar-dark bg-dark">
		<div class="container">
			<a href="a" class="navbar-brand">APPLICATION FORM </a>
		</div>
	</div>
	
	<div class="container" style="padding-top: 10px;">
		<h3>Create User</h3>
		<hr><form method="post"name="createUser" action="<?php echo base_url().'index.php/user/create';?>">
		<div class="row">
			
				<div class="col-md-6">
					<div class="form-group">
						<label>Name</label>
						<input type="text" value="<?php echo set_value('name');?>"name="name" class="form-control">
						<?php echo form_error('name');?>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" value="<?php echo set_value('email');?>" name="email" class="form-control">
						<?php echo form_error('email');?>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Create</button>
						<a href=""class="btn btn-secondary">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	<div class="container" style="padding-top: 10px;">
		<h4>Users view</h3>
		<hr>
		<div class="row">
		<div class="col-md-6">
			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php if (!empty($users)) {
					
					foreach($users as $user){?>
						<tr>
							<td><?php echo $user['user_id']?></td>
							<td><?php echo $user['name']?></td>
							<td><?php echo $user['email']?></td>
							<td>
								<a href="<?php echo base_url().'index.php/user/edit'.$user['user_id']?>" class="btn btn-primary">Edit</a>
							</td>
							<td><a href="<?php echo base_url().'index.php/user/delete'.$user['user_id']?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>
							<?php }} else{ ?>
								<tr>
									<td colspan="5">Record not found</td>
								</tr>
							<?php } ?>
				
			</table>
	</div>
</div>
</body>
</html>