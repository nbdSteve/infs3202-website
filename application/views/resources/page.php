<?php
$this->load->view('header.php');
?>
<?php echo form_open('resources/review/' . $resource->id . '/' . $_SESSION['id']); ?>
<div class="col-md-7">
	<h1 class="pt-2"><?php echo $resource->title; ?> v<?php echo $resource->version; ?></h1>
	<h4 class="text-secondary"><?php echo $resource->tag_line; ?></h4>
<!--	<button class="btn-hover">Purchase For $--><?php //echo $resource->price; ?><!--</button>-->
</div>
<div class="clearfix"></div>
<hr>
<div class="row">
	<div class="col-md-2">
		<img src="<?php echo site_url('uploads/' . $resource->icon); ?>" width="128" height="128"
			 class="p-2 alert-info">
	</div>
	<div class="col-md-9">
		<h5>Resource Description:</h5>
		<?php echo $resource->description; ?>
	</div>
	<div class="clearfix"></div>
</div>
<hr>
<div class="row">
	<div class="col-md-2">
		<h5>Author:</h5>
	</div>
	<div class="col-md-2">
		<img
			src="<?php echo site_url('uploads/' . $this->users_model->getData($resource->author)->profile_picture); ?>"
			width="128" height="128" class="p-2 alert-info">
		<h5 class="text-info"><?php echo $this->users_model->getUsername($resource->author); ?></h5>
	</div>
	<div class="clearfix"></div>
</div>
<hr>
<div class="row">
	<div class="col-md-2">
		<h5>Total Likes: <?php echo $this->likes_model->getLikes($resource->id); ?></h5>
	</div>
	<?php if ($_SESSION['id'] != $resource->author) {
		?>
		<div class="col-md-3">
			<?php if ($this->likes_model->hasLiked($resource->id, $_SESSION['id'])) { ?>
				<a href="<?php echo site_url('resources/unlike/' . $resource->id . '/' . $_SESSION['id']) ?>"
				   class="btn btn-danger">Remove Like</a>
			<?php } else { ?>
				<a href="<?php echo site_url('resources/like/' . $resource->id . '/' . $_SESSION['id']) ?>"
				   class="btn btn-primary">Add Like</a>
			<?php } ?>
		</div>
	<?php } ?>
	<div class="clearfix"></div>
</div>
<hr>
<div class="row">
	<div class="col-md-2">
		<h5>Reviews</h5>
	</div>
	<div class="col-md-3">
		<h5>Average Rating: <?php echo $this->reviews_model->getAverageScore($resource->id); ?> / 5</h5>
	</div>
	<table class="table table-bordered">
		<tr>
			<th class="p-3">User</th>
			<th class="p-3">Review</th>
			<th class="p-3">Score</th>
		</tr>
		<?php
		foreach ($reviews as $r) {
			?>
			<tr>
				<td><img
						src="<?php echo site_url('uploads/' . $this->users_model->getData($r->user_id)->profile_picture); ?>"
						width="96" height="96">
					<?php echo $this->users_model->getData($r->user_id)->username; ?>
				</td>
				<td><?php echo $r->review; ?></td>
				<td><?php echo $r->score; ?></td>
			</tr>
			<?php
		}
		?>
	</table>
	<div class="clearfix"></div>
</div>
<?php if ($_SESSION['id'] != $resource->author) {
	?>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<?php if ($this->reviews_model->hasReviewed($resource->id, $_SESSION['id'])) { ?>
				<a href="<?php echo site_url('resources/removeReview/' . $resource->id . '/' . $_SESSION['id']) ?>"
				   class="btn btn-danger">Remove Review</a>
				<input type="submit" name="submit" class="btn btn-info" value="Edit Review">
			<?php } else { ?>
				<input type="submit" name="submit" class="btn btn-primary" value="Add Review">
			<?php } ?>
		</div>
		<div class="col-md-7">
			<?php if (form_error('review')) {
				?>
				<div class="alert alert-danger" role="alert">
					<?php echo form_error('review'); ?>
				</div>
				<?php
			} ?>
			<textarea name="review" class="form-control">
		<?php if ($this->reviews_model->hasReviewed($resource->id, $_SESSION['id'])) {
			echo $this->reviews_model->getReview($resource->id, $_SESSION['id']);
		} ?>
		</textarea>
			<p class="text-info">Provide a review (100+ characters) of this resource here.</p>
		</div>
		<div class="col-md-2">
			<?php if (form_error('score')) {
				?>
				<div class="alert alert-danger" role="alert">
					<?php echo form_error('score'); ?>
				</div>
				<?php
			} ?>
			<input type="text" name="score" class="form-control" placeholder="
		<?php if ($this->reviews_model->hasReviewed($resource->id, $_SESSION['id'])) {
				echo $this->reviews_model->getReviewScore($resource->id, $_SESSION['id']);
			} ?>">
			<p class="text-info">Provide a review score (out of 5) for this resource here.</p>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php
}
$this->load->view('footer.php');
?>
