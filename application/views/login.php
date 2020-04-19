<?php
$this->load->view('header.php');
?>
<div class="m-5 p-5 col-md-4 mx-auto text-center ">
	<div class="m-5 table-bordered">
		<h1 class="p-2">Login</h1>
		<br>
		<form method="post" action="<?php echo site_url('login/verify') ?>">
			<div class="form-group m-3">
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
					<input type="text" name="username" placeholder="Username" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" class="form-control" required>
				</div>
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
