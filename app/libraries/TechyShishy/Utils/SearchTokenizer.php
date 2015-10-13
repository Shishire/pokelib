<?php

namespace TechyShishy\Utils;

class SearchTokenizer
{
	public static function tokenize($string)
	{
		$mbstring = new MBString($string);
		$quoted = false;
		$currentTerm = '';
		$currentValue = '';
		$escaped = false;
		$inTerm = true;
		$terms = array();
		foreach($mbstring->letters() as $char)
		{
			if( ( $quoted && !$escaped && $char !== '"' ) || $escaped )
			{
				if ($escaped)
				{
					$escaped = false;
				}
				if($inTerm)
				{
					$currentTerm .= $char;
				}
				else
				{
					$currentValue .= $char;
				}
			}
			else if($char === '"')
			{
				if($quoted)
				{
					$quoted = false;
				}
				else
				{
					$quoted = true;
				}
			}
			else
			{
				switch($char)
				{
					case ':':
						$inTerm = false;
						break;
					case '\\':
						$escaped = true;
						break;
					case ' ':
					case "\t":
					case "\n":
						$terms[$currentTerm] = $currentValue;
						$currentTerm = '';
						$currentValue = '';
						$inTerm = true;
						break;
					default:
						if($inTerm)
						{
							$currentTerm .= $char;
						}
						else
						{
							$currentValue .= $char;
						}
						break;
				}
			}
		}
		if($currentTerm)
		{
			$terms[$currentTerm] = $currentValue;
		}
		return $terms;
	}
}
