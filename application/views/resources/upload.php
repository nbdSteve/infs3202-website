<?php
$this->load->view('header.php');
?>
<h1 class="pt-2">Upload Resource</h1>
<?php echo form_open_multipart('resources/save'); ?>
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
					<?php if (form_error('title')) {
						?>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('title'); ?>
						</div>
						<?php
					} ?>
					<input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>">
					<p class="text-info">This will be the name of your resource.</p>
				</div>
				<div class="col-md-3">
					<?php if (form_error('version')) {
						?>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('version'); ?>
						</div>
						<?php
					} ?>
					<input type="text" placeholder="𝘝𝘦𝘳𝘴𝘪𝘰𝘯" name="version" class="form-control" value="<?php echo set_value('version'); ?>">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">Tag Line</label>
				<div class="col-md-10">
					<?php if (form_error('tag_line')) {
						?>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('tag_line'); ?>
						</div>
						<?php
					} ?>
					<input type="text" name="tag_line" class="form-control"
						   value="<?php echo set_value('tag_line'); ?>">
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
					<p class="text-info">Price of your resource in USD, leave this blank to make it free to
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
					<?php if (form_error('description')) {
						?>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('description'); ?>
						</div>
						<?php
					} ?>
					<textarea name="description" class="form-control"><?php echo set_value('description'); ?></textarea>
					<p class="text-info">Provide a more in-depth (100+ characters) and detailed description here,
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
					<?php if (form_error('resource')) {
						?>
						<div class="alert alert-danger" role="alert">
							<?php echo form_error('resource'); ?>
						</div>
						<?php
					} ?>
					<input type="file" name="resource" required>
					<p class="text-info">Upload your source file here.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<label class="col-md-2">Icon</label>
				<div class="col-md-10">
					<input type="file" name="icon" required>
					<p class="text-info">Upload your resource icon here.</p>
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
$this->load->view('footer.php');
?>
