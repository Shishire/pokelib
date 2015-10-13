<?php

namespace app\controllers;

use \app\models\PokemonFiles;
use lithium\data\Entity;
use \TechyShishy\Utils\SearchTokenizer;

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
		$filename = sprintf("%s - %X.pk6",$pokemon->getNickname(),$pokemon->getPersonality());
		header('Content-Disposition: attachment; filename="'.$filename.'.pk6"');
		echo $pokemon->file->bin;
		exit();
	}
	
	public function search()
	{
		if($this->request->data)
		{
			//$search = new PokemonSearch($this->request->data);
			
			$query = $this->request->data['query'];
			$parsedQuery = SearchTokenizer::tokenize($query);
			$pokemon = PokemonFiles::all(array('conditions' => $parsedQuery));
			
			//PokemonSearch::all(array('conditions' => array($this->request->data())));
			//return array('fields' => $search->getFormFields(), 'results' => $results);
		}
		return compact('pokemon');
	}
}