<?php
$this->load->view('admin/header.php');
?>
	<h1>Resources</h1>
	<a href="<?php echo site_url('admin/resources/add') ?>" class="btn btn-info">Add Resource</a>
	<hr>
<?php if ($this->session->flashdata('success')) {
	?>
	<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success') ?>
	</div>
	<hr>
	<?php
} ?>
<?php
if ($this->input->get('keyword')) {
	?>
	<b>Search result for <?php echo $this->input->get('keyword'); ?></b>
	<?php
}
?>
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Author</th>
			<th>Action</th>
		</tr>
		<?php
		foreach ($resources as $r) {
			?>
			<tr>
				<td><?php echo $r->id; ?></td>
				<td><?php echo $r->name; ?></td>
				<td><?php echo $r->description; ?></td>
				<td><?php echo $r->author; ?></td>
				<td><a href="<?php echo site_url('admin/resources/edit/' . $r->id) ?>" class="btn btn-primary">Edit</a>
					<a href="<?php echo site_url('admin/resources/delete/' . $r->id) ?>"
					   class="btn btn-danger">Delete</a></td>
			</tr>
			<?php
		}
		?>
	</table>
<?php echo $this->pagination->create_links(); ?>
<?php
$this->load->view('admin/footer.php');
?><?php
