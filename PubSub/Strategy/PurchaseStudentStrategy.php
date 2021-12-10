<?php

namespace Strategy;

use Entity\Service;

class PurchaseStudentStrategy implements PurchaseStrategy
{

	public function purchase(): Service
	{
		// take a little money :)

		$service = new Service();
		$service->setIsStudent(true);
		$service->setActivatedUntil((new \DateTime())->modify("+ 30 days"));
		$service->setType(Service::TYPES['student']);
		return $service;
	}
}