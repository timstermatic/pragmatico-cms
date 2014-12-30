<?php if($this->Session->check('Auth.User.id')) { ?>
<header class="navbar navbar-static-top">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo $this->Html->link('cms', '/', array('class'=>'navbar-brand'));?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php foreach(CakePlugin::loaded() as $plugin) { ?>
          <?php if(file_exists(CakePlugin::path($plugin) . 'View' . DS . 'Elements' . DS . 'cms_plugin_nav.ctp')) { ?>
            <?php echo $this->element('cms_plugin_nav', array('plugin'=>$plugin));?>
          <?php } ?>
        <?php } ?>
        <!--
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
          </ul>
        </li>
        -->
      </ul>
      <ul class="pull-right nav navbar-nav">
        <li><?php echo $this->Html->link('<i class="glyphicon glyphicon-cog"></i> ' . __('my account'), 
                    array('cms'=>false, 'plugin'=>false, 'controller'=>'users', 'action'=>'me'),
                    array('escape'=>false, 'class'=>'label'));?></li>
        <li><?php echo $this->Html->link('<i class="glyphicon glyphicon-log-out"></i> ' . __('logout'), 
                    array('cms'=>false, 'plugin'=>false, 'controller'=>'users', 'action'=>'logout'),
                    array('escape'=>false, 'class'=>'label'));?></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<?php } ?>
