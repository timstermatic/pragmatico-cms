<?php echo $this->Form->create();?>
<div class="row login">
 <div class="col-md-6 col-md-offset-3">
  <div class="panel panel-default">
  	<div class="panel-heading"><h3><?php echo __('CMS Login');?></h3></div>
  	<div class="panel-body">
  		
			<?php echo $this->Session->flash(); ?>
		<?php echo $this->Form->input('User.email', 
			array('class'=>'form-control'));?>
		<?php echo $this->Form->input('User.password', 
			array('class'=>'form-control'));?>

  	</div>
 	<div class="panel-footer">
 	<?php echo $this->Form->submit(__('Login'),
 		array('class'=>'btn btn-success'));?>
 	</div>
  </div>
 </div>
</div>
<?php echo $this->Form->end();?>
