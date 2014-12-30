<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $this->fetch('title'); ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
        echo $this->Html->script(array('jquery.min', 'bootstrap.min'));
        echo $this->Html->css(array('bootstrap.min', 'cms'));
	?>
</head>
<body>
    <?php echo $this->element('cms_nav'); ?>
	<div class="container">
			<?php echo $this->fetch('content'); ?>
	</div>
</body>
</html>
