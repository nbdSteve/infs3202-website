<?php
$this->load->view('user/header.php');
?>
<h1 class="pt-2">Editing Resource: $resource->title</h1>
<form action="<?php echo site_url('resources/update/' . $resource->id); ?>" method="post" enctype="multipart/form-data">
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
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">Title</label>
				<div class="col-md-7">
					<input type="text" name="title" class="form-control" value="<?php echo $resource->title; ?>">
					<p class="text-info">This will be the name of your resource.</p>
				</div>
				<div class="col-md-3">
					<input type="text" placeholder="𝘝𝘦𝘳𝘴𝘪𝘰𝘯" name="version" class="form-control"
						   value="<?php echo $resource->version; ?>">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">Tag Line</label>
				<div class="col-md-10">
					<input type="text" name="tag_line" class="form-control" value="<?php echo $resource->tag_line; ?>">
					<p class="text-info">Provide a one-line description of your resource.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">Price</label>
				<div class="col-md-1">
					<p class="text-right">$</p>
				</div>
				<div class="col-md-8">
					<input type="number" name="price" class="form-control" value="<?php echo $resource->price; ?>">
					<p class="text-info">Price of your resource in USD, set this to 0.00 to make it free to
						download.</p>
				</div>
				<div class="col-md-1">
					<p class="text-left">USD</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">Description</label>
				<div class="col-md-10">
					<textarea name="description" class="form-control">
						<?php echo $resource->description; ?>
					</textarea>
					<p class="text-info">Provide a more in-depth and detailed description here,
						the more detailed your description is the more likely you are to make sales.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">Resource</label>
				<div class="col-md-10">
					<input type="file" name="resource">
					<p class="text-info">Upload your source file here.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2 text-secondary">Source File</label>
				<div class="col-md-10 text-secondary">
					<?php echo $resource->resource; ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">Icon</label>
				<div class="col-md-10">
					<input type="file" name="icon">
					<p class="text-info">Upload your resource icon here, must be 64px by 64px.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2 text-secondary">Current Icon</label>
				<div class="col-md-10">
					<?php if ($resource->icon) { ?>
						<img src="<?php echo site_url('uploads/' . $resource->icon); ?>" width="128">
						<?php
					} ?>
				</div>
			</div>
		</div>
		<hr>
		<input type="submit" name="submit" class="btn btn-info" value="Save">
	</div>
	<div class="clearfix"></div>
</form>
<?php
$this->load->view('user/footer.php');
?>
