<?php
$this->load->view('header.php');
?>
<h1 class="pt-2"><?php echo $_SESSION['user']; ?>'s resources active on DIGIMΛЯƬ:</h1>
<hr>
<?php if ($this->session->flashdata('success')) {
	?>
	<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success') ?>
	</div>
	<hr>
	<?php
} ?>
<table class="table table-bordered">
	<tr>
		<th class="p-3">Icon</th>
		<th class="p-3">Name</th>
		<th class="p-3">Tag Line</th>
		<th class="p-3">Price</th>
		<th class="p-3">Description</th>
		<th class="p-3">Action</th>
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
			<td><a href="
			<?php echo site_url('resources/edit/' . $r->id) ?>" class="btn btn-primary">Edit</a>
				<a href="<?php echo site_url('resources/delete/' . $r->id) ?>"
				   class="btn btn-danger">Delete</a></td>
		</tr>
		<?php
	}
	?>
</table>
<?php
$this->load->view('footer.php');
?>
