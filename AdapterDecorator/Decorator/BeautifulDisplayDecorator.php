<?php

namespace Decorator;

use Service\Display;

class BeautifulDisplayDecorator extends AbstractDisplayDecorator
{

	public function display(): Display
	{
		$this->advBody = $this->display->addFutor();
		return $this;
	}
	public function addHeader(): string
	{
		return $this->header.$this->advBody;
	}
	public function addFutor(): string
	{
		return $this->addHeader().$this->futor;
	}
}