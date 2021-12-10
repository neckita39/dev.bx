<?php

use Entity\Service;
use Entity\User;

spl_autoload_register(static function($class) {
	include __DIR__ . 'index.php/' . str_replace("\\", "/", $class) . '.php';
});

\Event\EventBus::getInstance()->subscribe("onUserUpdate", "\\Helper\\Subscriber::userLog");


$user = new User();
$user
	->setName('Ivan')
	->add()
	->update()
	->logging()
;
print_r(\Strategy\PurchaseServiceContext::purchase(new \Strategy\PurchaseStudentStrategy()));