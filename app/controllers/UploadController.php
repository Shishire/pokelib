<?php

namespace app\controllers;

use \lithium\g11n\Message;
use \app\models\UnknownFiles;
use \app\models\PokemonFiles;
use \app\models\WondercardFiles;
use \app\models\SaveFiles;

use \lithium\analysis\Logger;

class UploadController extends \lithium\action\Controller {
	
	public function index()
	{
	}
	public function create()
	{
		if (!empty($this->request->data)) {
			// Convert to proper model
			$handle = fopen($this->request->data['file']['tmp_name'], 'rb');
			$stat = fstat($handle);
			$unknown = false;
			switch ($stat['size']) {
				case 232:
					// pk6 box File
					$fileData = fread($handle, 232);
					$modelClass = 'PokemonFiles';
					break;
				case 260:
					// pk6 Party File
					$fileData = fread($handle, 260);
					$modelClass = 'PokemonFiles';
					break;
				case 264:
					// wc6 File
					$fileData = fread($handle, 264);
					$modelClass = 'WondercardFiles';
					break;
				case 415232:
					// X/Y sav File
					$fileData = fread($handle, 415232);
					$modelClass = 'SaveFiles';
					break;
				case 483328:
					// sav File
					$fileData = fread($handle, 483328);
					$modelClass = 'SaveFiles';
					break;
				default:
					$unknown = true;
			}
			if (!$unknown)
			{
				$modelFullClass = 'app\\models\\'.$modelClass;
				$model = $modelFullClass::create(array('file' => $fileData, 'fileSize' => $stat['size']));
				switch($modelClass)
				{
					case 'PokemonFiles':
						$model->checksumValidates = $model->validateChecksum();
						$model->cachePokemonData();
				}
				if($model->save())
				{
					switch($modelClass)
					{
						case 'PokemonFiles':
							
							$controller = 'Pokemon';
							break;
						case 'SaveFiles':
							$controller = 'Saves';
							break;
						case 'WondercardFiles':
							$controller = 'Wondercards';
							break;
					}
					$this->redirect(array('controller' => $controller, 'action' => 'view', 'id' => $model->_id));
				}
			}
			else
			{
				$model = UnknownFiles::create(array('size' => $stat['size']));
			}
		}
		else
		{
			$model = UnknownFiles::create();
		}
		
		return compact('model') + array('uploadData' => $this->request->data);
	}
}