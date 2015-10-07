<?php

use \lithium\util\Validator;

Validator::add('arrayValueInList', function($value, $format, $options) {
	echo 'foo!';
	$key = isset($options['key']) ? $options['key'] : null;
	$keyValue = isset($value[$key]) ? $value[$key] : null;
	return Validator::isInList($keyValue, $format, $options);
});