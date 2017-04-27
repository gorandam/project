<div>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
	<?php foreach($viewmodel as $row) : ?>
		<div class="well">
			<h3><?php echo $row['title']; ?></h3> 
			<small><?php echo $row['create_date']; ?></small>
			<hr />
			<p><?php echo $row['body']; ?></p>
			<br />
			<a class="btn btn-default" href="<?php echo $row['link']; ?>" target="_blank">Go To Website</a>
		</div>
	<?php endforeach; ?>

</div>