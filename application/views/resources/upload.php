<?php
$this->load->view('user/header.php');
?>
<h1 class="pt-2">Upload Resource</h1>
<form action="<?php echo site_url('resources/save'); ?>" method="post" enctype="multipart/form-data">
	<div class="col-md-8">
		<hr>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">Title</label>
				<div class="col-md-7">
					<input type="text" name="title" class="form-control">
					<p class="text-info">This will be the name of your resource.</p>
				</div>
				<div class="col-md-3">
					<input type="text" placeholder="𝘝𝘦𝘳𝘴𝘪𝘰𝘯" name="version" class="form-control">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">Tag Line</label>
				<div class="col-md-10">
					<input type="text" name="tag_line" class="form-control">
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
					<input type="number" name="price" class="form-control">
					<p class="text-info">Price of your resource in USD, set this to 0.00 to make it free to download.</p>
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
					<textarea name="description" class="form-control"></textarea>
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
				<label class="col-md-2">Icon</label>
				<div class="col-md-10">
					<input type="file" name="icon">
					<p class="text-info">Upload your resource icon here, must be 64px by 64px.</p>
				</div>
				<div class="clearfix"></div>
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
