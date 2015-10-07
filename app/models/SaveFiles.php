<?php

namespace app\models;

class SaveFiles extends \lithium\data\Model {
	public $validates = array(
		'fileSize' => array(
			array(
				'inList',
				'message' => 'Unrecognized file size.',
				'required' => true,
				'list' => array(
					415232, // X/Y Save File
					483328  // ORAS Save File
					)
				)
			)
		);
}