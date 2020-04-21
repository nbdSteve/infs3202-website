<?php
$this->load->view('header.php');
?>
<h1 class="pt-2">Welcome back to DIGIMΛЯƬ, <?php echo $_SESSION['user']; ?>!</h1>
<?php if ($this->session->flashdata('success')) {
	?>
	<hr>
	<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success') ?>
	</div>
	<?php
} ?>
<hr>
<h4 class="pb-2">Latest resources:</h4>
<table class="table table-bordered">
	<tr>
		<th>Icon</th>
		<th>Name</th>
		<th>Tag Line</th>
		<th>Price</th>
		<th>Description</th>
		<th>Author</th>
	</tr>
	<?php
	foreach ($resources as $r) {
		?>
		<tr>
			<td><img src="<?php echo site_url('uploads/' . $r->icon); ?>" width="128" height="128"></td>
			<td><?php echo $r->title; ?> v<?php echo $r->version; ?></td>
			<td><?php echo $r->tag_line; ?></td>
			<td>$<?php echo $r->price; ?> USD</td>
			<td><?php echo $r->description; ?></td>
			<td>
				<div class="p-1 alert-info text-center">
					<img
						src="<?php echo site_url('uploads/' . $this->users_model->getData($r->author)->profile_picture); ?>"
						width="96" height="96">
					<?php echo $this->users_model->getUsername($r->author); ?>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</table>
<?php
$this->load->view('footer.php');
?>
