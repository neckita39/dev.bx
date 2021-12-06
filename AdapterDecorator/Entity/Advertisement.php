<?php

namespace Entity;

class Advertisement
{
	private  $title;
	private  $body;
	private  $duration;

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		if ($this->title)
		{
			return $this->title;
		}
		return "default title";
	}

	/**
	 * @param string $title
	 * @return Advertisement
	 */
	public function setTitle(string $title): Advertisement
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBody(): string
	{
		if ($this->body)
		{
			return $this->body;
		}
		return "default body";
	}

	/**
	 * @param string $body
	 * @return Advertisement
	 */
	public function setBody(string $body): Advertisement
	{
		$this->body = $body;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getDuration(): int
	{
		return $this->duration;
	}

	/**
	 * @param int $duration
	 * @return Advertisement
	 */
	public function setDuration(int $duration): Advertisement
	{
		$this->duration = $duration;
		return $this;
	}


}