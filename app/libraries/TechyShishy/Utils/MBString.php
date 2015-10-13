<?php

namespace TechyShishy\Utils;

class MBString
{
	protected $string = '';
	
	public function __construct($string)
	{
		$this->string = $string;
	}

	public static function _strlen($a)
	{
		return mb_strlen($a,'UTF-8');
	}
	public function strlen()
	{
		return self::_strlen($this->string);
	}

	public static function _charAt($a,$i)
	{
		return self::_substr($a,$i,1);
	}
	public function charAt($i)
	{
		return self::_charAt($this->string,$i);
	}

	public static function _substr($a,$x,$y=null)
	{
		if($y===NULL){
			$y=self::_strlen($a);
		}
		return mb_substr($a,$x,$y,'UTF-8');
	}
	public function substr($x,$y=null)
	{
		return self::_substr($this->string,$x,$y);
	}

	public static function _letters($a){
		$len = self::_strlen($a);
		if($len==0)
		{
			return array();
		}
		else if($len == 1)
		{
			return array($a);
		}
		else
		{
			return array_merge(
				self::_letters(self::_substr($a,0,$len>>1)),
				self::_letters(self::_substr($a,$len>>1))
			);
		}
	}
	public function letters()
	{
		return self::_letters($this->string);
	}
}
