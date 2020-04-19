<?php
$this->load->view('header.php');
?>
<div class="m-5 p-5 col-md-4 mx-auto text-center ">
	<div class="m-5 table-bordered">
		<h1 class="p-2">Create Account</h1>
		<br>
		<form method="post" action="<?php echo site_url('create/create') ?>">
			<div class="form-group m-3">
				<?php if ($this->session->flashdata('error')) {
					?>
					<div class="alert alert-danger" role="alert">
						<?php echo $this->session->flashdata('error') ?>
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
					<input type="submit" name="submit" value="Create" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>
<?php
$this->load->view('footer.php');
?>
