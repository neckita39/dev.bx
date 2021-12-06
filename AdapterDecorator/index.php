<?php

spl_autoload_register(function ($class) {
	include __DIR__ . '/' . str_replace("\\", "/", $class) . '.php';
});

$advertisement = (new \Entity\Advertisement())
->setBody("Реклама на Facebook");

$display= new \Service\AdvDisplay($advertisement);
$display->display();
$display= new \Decorator\BeautifulDisplayDecorator($display);
echo $display->display()->addFutor();


