<?php

namespace External;

class FacebookAdvertisementResult
{
	public  $targetingName;

	public function getTargetingName(): string
	{
		return $this->targetingName;
	}

	public function setTargetingName(string $targetingName): FacebookAdvertisementResult
	{
		$this->targetingName = $targetingName;
		return $this;
	}
}