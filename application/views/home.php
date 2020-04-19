<?php
$this->load->view('header.php');
?>
<div class="m-5 p-5 col-md-4 mx-auto text-center ">
	<div class="m-5 table-bordered">
		<h1 class="m-4">DigiMart</h1>
		<br>
		<a href="<?php echo site_url('login') ?>" class="m-5 btn btn-info">Login</a>
		<a href="<?php echo site_url('create') ?>" class="m-5 btn btn-info">Signup</a>
	</div>
</div>
<?php
$this->load->view('footer.php');
?>
