<?php
$this->load->view('user/header.php');
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
<?php
if ($this->input->get('keyword')) {
	?>
	<hr>
	<b>Search result for <?php echo $this->input->get('keyword'); ?></b>
	<?php
}
?>
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
			<td><img src="<?php echo site_url('uploads/' . $r->icon); ?>"</td>
			<td><?php echo $r->title; ?> v<?php echo $r->version; ?></td>
			<td><?php echo $r->tag_line; ?></td>
			<td>$<?php echo $r->price; ?> USD</td>
			<td><?php echo $r->description; ?></td>
			<td><?php echo $this->users_model->getUsername($r->author); ?></td>
			<!--			<td><a href="-->
			<?php //echo site_url('admin/resources/edit/' . $r->id) ?><!--" class="btn btn-primary">Edit</a>-->
			<!--				<a href="--><?php //echo site_url('admin/resources/delete/' . $r->id) ?><!--"-->
			<!--				   class="btn btn-danger">Delete</a></td>-->
		</tr>
		<?php
	}
	?>
</table>
<?php
$this->load->view('user/footer.php');
?>
