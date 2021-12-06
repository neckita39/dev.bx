<?php

namespace External;

class FacebookAdvertisement
{
	private  $title;
	private  $messageBody;
	public function getTitle(): string
	{
		return $this->title;
	}

	public function setTitle(string $title): FacebookAdvertisement
	{
		$this->title=$title;
		return $this;
	}

	public function getMessageBody(): string
	{
		return $this->messageBody;
	}

	public function setMessageBody(string $messageBody): FacebookAdvertisement
	{
		$this->messageBody=$messageBody;
		return $this;
	}

}