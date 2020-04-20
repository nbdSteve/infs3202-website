<?php
$this->load->view('header.php');
?>
<?php echo form_open('create'); ?>
<div class="m-5 p-5 col-md-4 mx-auto text-center ">
	<div class="m-5 table-bordered">
		<br>
		<h1>Create Account</h1>
		<form method="post" action="<?php echo site_url('create/create') ?>">
			<div class="form-group m-3">
				<hr>
				<?php if ($this->session->flashdata('error')) {
					?>
					<div class="alert alert-danger" role="alert">
						<?php echo $this->session->flashdata('error') ?>
					</div>
					<hr>
					<?php
				} ?>
				<div class="form-group">
					<?php if (form_error('email')) {
						?>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('email'); ?>
						</div>
						<?php
					} ?>
					<input type="text" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>"
						   class="form-control">
				</div>
				<div class="form-group">
					<?php if (form_error('username')) {
						?>
						<hr>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('username'); ?>
						</div>
						<?php
					} ?>
					<input type="text" name="username" placeholder="Username"
						   value="<?php echo set_value('username'); ?>" class="form-control">
				</div>
				<div class="form-group">
					<?php if (form_error('password')) {
						?>
						<hr>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('password'); ?>
						</div>
						<?php
					} ?>
					<input type="password" name="password" placeholder="Password"
						   value="<?php echo set_value('password'); ?>" class="form-control">
				</div>
				<div class="form-group">
					<?php if (form_error('password_conf')) {
						?>
						<hr>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('password_conf'); ?>
						</div>
						<?php
					} ?>
					<input type="password" name="password_conf" placeholder="Confirm Password"
						   value="<?php echo set_value('password_conf'); ?>" class="form-control">
				</div>
				<hr>
				<div class="form-group">
					<input type="submit" name="submit" value="Create" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>
<?php
$this->load->view('footer.php');
?>
