<?php

namespace Service;

use Entity\Advertisement;

class AdvDisplay implements Display
{

	private $result;
	private $advertisement;
	public function __construct(Advertisement $advertisement)
	{
		$this->advertisement=$advertisement;
	}

	public function display(): Display
	{
		$this->result = $this->advertisement->getBody();

		return $this;
	}
	public function addHeader(): string
	{
		return $this->result;
	}
	public function addFutor(): string
	{
		return $this->result;
	}
}