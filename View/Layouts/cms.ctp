<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $this->fetch('title'); ?></title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
        echo $this->Html->css(array('bootstrap.min', 'cms'));
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
		


			<?php echo $this->fetch('content'); ?>
		
	</div>
</body>
</html>
