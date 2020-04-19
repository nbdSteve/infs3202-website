<?php
$this->load->view('admin/header.php');
?>
	<h1>Add New Resource</h1>
	<form action="<?php echo site_url('admin/resources/save'); ?>" method="post">
		<div class="col-md-7">
			<div class="form-group">
				<div class="row">
					<label class="col-md-3">Name</label>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control">
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-3">Description</label>
					<div class="col-md-9">
						<textarea name="description" class="form-control"></textarea>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-3">Author</label>
					<div class="col-md-9">
						<input type="text" name="author" class="form-control">
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

