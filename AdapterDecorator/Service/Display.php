<?php

namespace Service;

interface Display
{
	public function display(): Display;
	public function addHeader(): string;
	public function addFutor(): string;
}