<?php

namespace app\models;

class WondercardFiles extends \lithium\data\Model {
	public $validates = array(
		'fileSize' => array(
			array(
				'nList',
				'message' => 'Unrecognized file size.',
				'required' => true,
				'list' => array(
					264 // Wondercard Data
					)
				)
			)
		);
}