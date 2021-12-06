<?php

namespace Service\Formatting;

class HtmlTextFormatter implements Formatter
{

	public function format(string $text): string
	{
		return "<h1>". $text . "</h1>";
	}
}