<?php



spl_autoload_register(function ($class)
{
	include __DIR__ . 'index.php/' . str_replace("\\", "/", $class) . '.php';
});

$archer=new \Army\Weapon\ArcherWeapon();
$build_archer = new \Army\Builder\ArcherBuilder();
$director=new \Army\Builder\Director();
$director=$director::build($build_archer);
$build_archer=$build_archer->addRightHandWeapon($archer->createBow())->addLeftHandWeapon($archer->createKnife())->getWarrior();
var_dump($build_archer);


