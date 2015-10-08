<?php

namespace app\controllers;

use \app\models\PokemonFiles;

class PokemonController extends \lithium\action\Controller
{
	public function view()
	{
		$pokemon = PokemonFiles::find($this->request->id);
		return compact('pokemon');
	}
	
	public function download()
	{
		$pokemon = PokemonFiles::find($this->request->id);
		header('Content-Type: application/octet-stream');
		header('Content-Length: '.strlen($pokemon->file->bin));
		header('Content-Disposition: attachment; filename="'.$pokemon->getNickname().' - '.strtoupper(dechex($pokemon->getPersonality())).'.pk6"');
		echo $pokemon->file->bin;
		exit();
	}
}