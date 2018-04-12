# Query Log for CakePHP
This project for help you to print out the query of method in cakephp.

## Installation
This repository should be installed in the same way as any other plugin.
```
cd <work folder>/app/Plugin
git clone git://github.com/BananaBb/cakephp-querylog.git QueryLog
```
### composer
This plugin on the Packagist.
https://packagist.org/packages/bananabb/cakephp-querylog

## Sample Code
Add plugin load to your project
```
cd <work folder>/app/Config/bootstrap.php
CakePlugin::load('QueryLog');
```
Usage of this function
```
class ClassName extends ClassExtend
{
    public $components = array('QueryLog.Logger');
    .
    .
    .
    .

    $this->Logger->main(Model, SearchParamater);
```

## Author
BananaBb