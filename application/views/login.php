<?php
$this->load->view('header.php');
?>
<?php echo form_open('login'); ?>
<div class="m-5 p-5 col-md-4 mx-auto text-center ">
	<div class="m-5 table-bordered">
		<br>
		<h1>Login</h1>
		<form method="post" action="<?php echo site_url('login/verify') ?>">
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
				<?php if ($this->session->flashdata('success')) {
					?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success') ?>
					</div>
					<hr>
					<?php
				} ?>
				<div class="form-group">
					<?php if (form_error('username')) {
						?>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('username'); ?>
						</div>
						<?php
					} ?>
					<input type="text" name="username" placeholder="Email or Username" value="<?php echo set_value('username'); ?>" class="form-control">
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
					<input type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" class="form-control">
				</div>
				<hr>
				<div class="form-group">
					<input type="submit" name="submit" value="Login" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>
<?php
$this->load->view('footer.php');
?>
