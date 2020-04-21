<?php
$this->load->view('header.php');
?>
<h1 class="pt-2">Account Settings (<?php echo $user->username; ?>)</h1>
<?php echo form_open_multipart('user/account'); ?>
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
		<?php if ($this->session->flashdata('error')) {
			?>
			<div class="alert alert-danger" role="alert">
				<?php echo $this->session->flashdata('error') ?>
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
				<label class="col-md-3">Profile Picture</label>
				<div class="col-md-7">
					<?php if ($user->profile_picture != "") {
						?>
						<img class="p-2 alert-info" src="<?php echo site_url('uploads/' . $user->profile_picture); ?>"
							 width="128" height="128">
						<br>
						<br>
						<?php
					} ?>
					<input type="file" name="profile_picture">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Email</label>
				<div class="col-md-9">
					<?php if (form_error('email')) {
						?>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('email'); ?>
						</div>
						<?php
					} ?>
					<input type="text" name="email" value="<?php echo set_value('email'); ?>"
						   placeholder="<?php echo $user->email; ?>" class="form-control">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Username</label>
				<div class="col-md-9">
					<?php if (form_error('username')) {
						?>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('username'); ?>
						</div>
						<?php
					} ?>
					<input type="text" name="username" class="form-control"
						   value="<?php echo set_value('username'); ?>" placeholder="<?php echo $user->username; ?>">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Change Password</label>
				<div class="col-md-9">
					<?php if (form_error('password')) {
						?>
						<hr>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('password'); ?>
						</div>
						<?php
					} ?>
					<input type="password" name="password" placeholder="New Password"
						   value="<?php echo set_value('password'); ?>" class="form-control">
				</div>
				<div class="clearfix"></div>
			</div>
			<br>
			<div class="row">
				<label class="col-md-3">Confirm Password</label>
				<div class="col-md-9">
					<?php if (form_error('password_conf')) {
						?>
						<hr>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('password_conf'); ?>
						</div>
						<?php
					} ?>
					<input type="password" name="password_conf" placeholder="Confirm New Password"
						   value="<?php echo set_value('password_conf'); ?>" class="form-control">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<input type="submit" name="submit" class="btn btn-info" value="Save">
	</div>
	<div class="clearfix"></div>
	<?php
	$this->load->view('footer.php');
	?>
