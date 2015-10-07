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
}