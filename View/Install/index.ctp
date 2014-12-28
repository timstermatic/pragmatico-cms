<?php echo $this->Form->create();?>
<div class="row">
 <div class="col-md-6 col-md-offset-3">
  <div class="panel panel-default">
  	<div class="panel-heading"><h3><?php echo __('Install Pragmatico CMS');?></h3></div>
  	<div class="panel-body">
  		<p class="alert alert-info">
  			<i class="glyphicon glyphicon-user"></i>  
  			<?php echo __('Create an administrator account');?>
  		</p>
  		
  			<?php echo $this->Form->input('User.email', 
  				array('class'=>'form-control'));?>
  			<?php echo $this->Form->input('User.password', 
  				array('class'=>'form-control'));?>
  			<?php echo $this->Form->input('User.confirm_password', 
  				array('class'=>'form-control', 'type'=>'password'));?>
  	</div>
 	<div class="panel-footer">
 	<?php echo $this->Form->submit(__('Create user'),
 		array('class'=>'btn btn-success'));?>
 	</div>
  </div>
 </div>
</div>
<?php echo $this->Form->end();?>