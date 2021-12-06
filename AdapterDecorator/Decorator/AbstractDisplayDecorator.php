<?php

namespace Decorator;

use Service\Display;

abstract class AbstractDisplayDecorator implements Display
{
	protected  $display;
	protected $advBody;
	protected $header="<h1>Внимание</h1>";
	protected $futor="<h4>Ждём вас</h4>";
	public function __construct(Display $display)
	{
		$this->display=$display;
	}
}