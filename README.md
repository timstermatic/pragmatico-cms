# pragmatico cms
An extensible Content Management System based on CakePHP.

## Requirements
* PHP 5.4+
* MySQL 5+
* composer

## Installation

##### Optional - launch the vagrant box.
You can develop with pragmatico CMS using the included Vagrant provision. If you want to use your own folder, skip to "Gather dependencies". Otherwise run `vagrant up` and then `vagrant ssh` and finally `cd /vagrant` in your vagrant box before continuing.

##### Gather dependencies.
Pragmatico CMS stands on the shoulders of giants. Composer can be used to install all the third party goodies that are required. You'll need composer installed first, but you can then run `composer install`

##### Create the initial tables.
`./Console/cake Migrations.migration run all`

##### Create your admin user.
Just load http://localhost:1337 and you will be taken through the install procedure.

##### Install plugins or hack it.

pragmatic cms doesn't do much without plugins. The best one to start with is the [Pages](https://github.com/timstermatic/pragmatico-cms-pages) plugin. It's also a good template for building your own plugins.
