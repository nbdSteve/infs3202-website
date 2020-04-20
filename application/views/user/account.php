<?php
$this->load->view('user/header.php');
?>
<h1 class="pt-2">Account Settings (<?php echo $user->username; ?>)</h1>
<form action="<?php echo site_url('user/account/update/' . $user->id); ?>" method="post" enctype="multipart/form-data">
	<div class="col-md-8">
		<hr>
		<?php if ($this->session->flashdata('success')) {
			?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('success') ?>
			</div>
			<hr>
			<?php
		} ?>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">User ID</label>
				<div class="col-md-2">
					<p class="text-info"><?php echo $user->id; ?></p>
				</div>
				<div class="clearfix"></div>
			</div>
			<hr>
		</div>
		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Email</label>
				<div class="col-md-7">
					<input type="text" name="email" class="form-control" placeholder="<?php echo $user->email; ?>">
				</div>
				<div class="col-md-2">
					<input type="submit" name="submit" class="btn btn-info" value="Update">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Username</label>
				<div class="col-md-7">
					<input type="text" name="username" class="form-control"
						   placeholder="<?php echo $user->username; ?>">
				</div>
				<div class="col-md-2">
					<input type="submit" name="submit" class="btn btn-info" value="Update">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Change Password</label>
				<div class="col-md-7">
					<input type="password" name="password" class="form-control" placeholder="New Password">
				</div>
				<div class="clearfix"></div>
			</div>
			<br>
			<div class="row">
				<label class="col-md-3">Confirm Password</label>
				<div class="col-md-7">
					<input type="password" name="password_conf" class="form-control" placeholder="Confirm New Password">
				</div>
				<div class="col-md-2">
					<input type="submit" name="submit" class="btn btn-info" value="Update">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<input type="submit" name="submit" class="btn btn-info" value="Update All">
	</div>
	<div class="clearfix"></div>
	<?php
	$this->load->view('user/footer.php');
	?>
