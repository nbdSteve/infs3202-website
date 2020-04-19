<?php
$this->load->view('admin/header.php');
?>
	<h1>Edit Resource</h1>
	<form action="<?php echo site_url('admin/resources/update/' . $resource->id); ?>" method="post" enctype="multipart/form-data">
		<div class="col-md-7">
			<div class="form-group">
				<div class="row">
					<label class="col-md-3">Name</label>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control" value="<?php echo $resource->name; ?>">
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-3">Description</label>
					<div class="col-md-9">
						<textarea name="description" class="form-control">
							<?php echo $resource->description; ?>
						</textarea>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-3">Author</label>
					<div class="col-md-9">
						<input type="text" name="author" class="form-control" value="<?php echo $resource->author; ?>">
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-3">Image</label>
					<div class="col-md-9">
						<input type="file" name="image" class="form-control">
						<?php if ($resource->image) { ?>
							<img src="<?php echo site_url('uploads/'.$resource->image); ?>" width="500">
						<?php
						} ?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<input type="submit" name="submit" class="btn btn-info" value="Save Resource">
		</div>
		<div class="clearfix"></div>
	</form>
<?php
$this->load->view('admin/footer.php');
?><?php
