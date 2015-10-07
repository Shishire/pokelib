<?php

namespace app\models;

class UnknownFiles extends \lithium\data\Model {
	public $validates = array(
		'fileSize' => array(
			array(
				'inList',
				'message' => 'Unrecognized file size.',
				'required' => true,
				'list' => array(
					232,    // Box Data 
					260,    // Party Data
					264,    // Wondercard Data
					415232, // X/Y Save File
					483328  // ORAS Save File
					)
				)
			)
		);
}