<?php
$this->load->view('header.php');
?>
<h1 class="pt-2">Create Account</h1>
<?php echo form_open('create'); ?>
<div class="col-md-8">
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
<?php
$this->load->view('footer.php');
?>
