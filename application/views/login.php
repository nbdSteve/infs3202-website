<?php
$this->load->view('header.php');
?>
<h1 class="pt-2">Login</h1>
<?php echo form_open('login'); ?>
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
		<input type="text" name="username" placeholder="Email or Username" value="<?php echo set_value('username'); ?>"
			   class="form-control">
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
		<input type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>"
			   class="form-control">
	</div>
	<hr>
	<div class="form-group">
		<input type="submit" name="submit" value="Login" class="btn btn-primary">
	</div>
</div>
</form>
<?php
$this->load->view('footer.php');
?>
