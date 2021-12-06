<?php

namespace Service;

use Entity\Advertisement;
use Entity\AdvertisementResponse;

class FacebookProvider extends AbstractAdvertisementProvider
{

	public function publicate(Advertisement $advertsement): AdvertisementResponse
	{
		$advertsement->setBody($this->formatter->format($advertsement->getBody()));
		//TODO
	}

	public function prepare(Advertisement $advertsement)
	{
		if (!$advertsement->getTitle())
		{
			$advertsement->setTitle("hello form Facebook");
		}
	}

	public function check(Advertisement $advertsement)
	{
		// TODO: Implement check() method.
	}

	public function calculateDuration(Advertisement $advertsement)
	{
		// TODO: Implement calculateDuration() method.
	}
}