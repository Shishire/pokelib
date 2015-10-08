<?php

namespace app\models;

class PokemonFiles extends \lithium\data\Model {
	
	const FATEFUL_FLAG    = 0x1;
	const FEMALE_FLAG     = 0x2;
	const GENDERLESS_FLAG = 0x4;
	
	// Encryption Data
	public function getEncryptionKey($entity){                       return unpack('V1out',substr($entity->file->bin,0x00,4))['out']; }
	public function getPlaceholder($entity){                         return unpack('v1out',substr($entity->file->bin,0x04,2))['out']; }
	public function getChecksum($entity){                            return unpack('v1out',substr($entity->file->bin,0x06,2))['out']; }
	// Block A
	public function getDexId($entity){                               return unpack('v1out',substr($entity->file->bin,0x08,2))['out']; }
	public function getHeldItem($entity){                            return unpack('v1out',substr($entity->file->bin,0x0A,2))['out']; }
	public function getOriginalTrainerId($entity){                   return unpack('v1out',substr($entity->file->bin,0x0C,2))['out']; }
	public function getOriginalTrainerSecretId($entity){             return unpack('v1out',substr($entity->file->bin,0x0E,2))['out']; }
	public function getOriginalTrainerIds($entity){                  return array($entity->getOriginalTrainerID(), $entity->getOriginalTrainerSecretID()); }
	public function getExperience($entity){                          return unpack('V1out',substr($entity->file->bin,0x10,4))['out']; }
	public function getAbility($entity){                             return unpack('C1out',substr($entity->file->bin,0x14,1))['out']; }
	public function getAbilityNumber($entity){                       return unpack('C1out',substr($entity->file->bin,0x15,1))['out']; }
	public function getTrainingBag($entity){                         return unpack('C1out',substr($entity->file->bin,0x16,1))['out']; }
	public function getTrainingBagHitsRemaining($entity){            return unpack('C1out',substr($entity->file->bin,0x17,1))['out']; }
	public function getPersonality($entity){                         return unpack('V1out',substr($entity->file->bin,0x18,4))['out']; }
	public function getNature($entity){                              return unpack('C1out',substr($entity->file->bin,0x1C,1))['out']; }
	public function getFormsFlags($entity){                          return unpack('C1out',substr($entity->file->bin,0x1D,1))['out']; }
	public function getFatefulEncounter($entity){                    return $entity->getFormsFlags() & self::FATEFUL_FLAG; }
	public function getFemale($entity){                              return $entity->getFormsFlags() & self::FEMALE_FLAG; }
	public function getGenderless($entity){                          return $entity->getFormsFlags() & self::GENDERLESS_FLAG; }
	public function getForm($entity){                                return ($entity->getFormsFlags() & ( ~ ( self::FEMALE_FLAG & self::FATEFUL_FLAG & self::GENDERLESS_FLAG ) ) >> 0x3); }
	public function getGenderMarker($entity){                        return ($entity->getGenderless() ? 'U' : ($entity->getFemale() ? 'F' : 'M')); }
	public function getHPEffortValue($entity){                       return unpack('C1out',substr($entity->file->bin,0x1E,1))['out']; }
	public function getAttackEffortValue($entity){                   return unpack('C1out',substr($entity->file->bin,0x1F,1))['out']; }
	public function getDefenseEffortValue($entity){                  return unpack('C1out',substr($entity->file->bin,0x20,1))['out']; }
	public function getSpeedEffortValue($entity){                    return unpack('C1out',substr($entity->file->bin,0x21,1))['out']; }
	public function getSpecialAttackEffortValue($entity){            return unpack('C1out',substr($entity->file->bin,0x22,1))['out']; }
	public function getSpecialDefenseEffortValue($entity){           return unpack('C1out',substr($entity->file->bin,0x23,1))['out']; }
	public function getContestStatsCool($entity){                    return unpack('C1out',substr($entity->file->bin,0x24,1))['out']; }
	public function getContestStatsBeauty($entity){                  return unpack('C1out',substr($entity->file->bin,0x25,1))['out']; }
	public function getContestStatsCute($entity){                    return unpack('C1out',substr($entity->file->bin,0x26,1))['out']; }
	public function getContestStatsSmart($entity){                   return unpack('C1out',substr($entity->file->bin,0x27,1))['out']; }
	public function getContestStatsTough($entity){                   return unpack('C1out',substr($entity->file->bin,0x28,1))['out']; }
	public function getContestStatsSheen($entity){                   return unpack('C1out',substr($entity->file->bin,0x29,1))['out']; }
	public function getMarkings($entity){                            return unpack('C1out',substr($entity->file->bin,0x2A,1))['out']; }
	public function getPokerus($entity){                             return unpack('C1out',substr($entity->file->bin,0x2B,1))['out']; }
	public function getSuperTrainingFlags($entity){                  return unpack('V1out',substr($entity->file->bin,0x2C,4))['out']; }
	public function getRibbons($entity){                             return                substr($entity->file->bin,0x30,6); }
	public function getContestMemoryRibbonCount($entity){            return unpack('C1out',substr($entity->file->bin,0x38,1))['out']; }
	public function getBattleMemoryRibbonCount($entity){             return unpack('C1out',substr($entity->file->bin,0x39,1))['out']; }
	public function getDistributionTrainingFlags($entity){           return unpack('C1out',substr($entity->file->bin,0x3A,1))['out']; }
	// Block B
	public function getNickname($entity){                            return mb_convert_encoding(mb_strstr(substr($entity->file->bin,0x40,26),mb_convert_encoding("\0", "UTF-16LE"),true,"UTF-16LE"),"UTF-8", "UTF-16LE"); }
	public function getMove1($entity){                               return unpack('v1out',substr($entity->file->bin,0x5A,2))['out']; }
	public function getMove2($entity){                               return unpack('v1out',substr($entity->file->bin,0x5C,2))['out']; }
	public function getMove3($entity){                               return unpack('v1out',substr($entity->file->bin,0x5E,2))['out']; }
	public function getMove4($entity){                               return unpack('v1out',substr($entity->file->bin,0x60,2))['out']; }
	public function getMove1PP($entity){                             return unpack('C1out',substr($entity->file->bin,0x62,1))['out']; }
	public function getMove2PP($entity){                             return unpack('C1out',substr($entity->file->bin,0x63,1))['out']; }
	public function getMove3PP($entity){                             return unpack('C1out',substr($entity->file->bin,0x64,1))['out']; }
	public function getMove4PP($entity){                             return unpack('C1out',substr($entity->file->bin,0x65,1))['out']; }
	public function getMove1PPUp($entity){                           return unpack('C1out',substr($entity->file->bin,0x66,1))['out']; }
	public function getMove2PPUp($entity){                           return unpack('C1out',substr($entity->file->bin,0x67,1))['out']; }
	public function getMove3PPUp($entity){                           return unpack('C1out',substr($entity->file->bin,0x68,1))['out']; }
	public function getMove4PPUp($entity){                           return unpack('C1out',substr($entity->file->bin,0x69,1))['out']; }
	public function getRelearnMove1($entity){                        return unpack('v1out',substr($entity->file->bin,0x6A,2))['out']; }
	public function getRelearnMove2($entity){                        return unpack('v1out',substr($entity->file->bin,0x6C,2))['out']; }
	public function getRelearnMove3($entity){                        return unpack('v1out',substr($entity->file->bin,0x6E,2))['out']; }
	public function getRelearnMove4($entity){                        return unpack('v1out',substr($entity->file->bin,0x70,2))['out']; }
	public function getSuperSecretTrainingFlag($entity){             return unpack('C1out',substr($entity->file->bin,0x72,1))['out']; }
	public function getIndividualValueSpread($entity){               return unpack('V1out',substr($entity->file->bin,0x74,4))['out']; }
	public function getHPIndividualValue($entity){                   return ($entity->getIndividualValueSpread()>>0) & 31; }
	public function getAttackIndividualValue($entity){               return ($entity->getIndividualValueSpread()>>5) & 31; }
	public function getDefenseIndividualValue($entity){              return ($entity->getIndividualValueSpread()>>10) & 31; }
	public function getSpeedIndividualValue($entity){                return ($entity->getIndividualValueSpread()>>15) & 31; }
	public function getSpecialAttackIndividualValue($entity){        return ($entity->getIndividualValueSpread()>>20) & 31; }
	public function getSpecialDefenseIndividualValue($entity){       return ($entity->getIndividualValueSpread()>>25) & 31; }
	public function getIsEgg($entity){                               return ($entity->getIndividualValueSpread()>>30) & 1; }
	public function getIsNicknamed($entity){                         return ($entity->getIndividualValueSpread()>>31) & 1; }
	// Block C
	public function getCurrentTrainerName($entity){                  return mb_convert_encoding(mb_strstr(substr($entity->file->bin,0x78,26),mb_convert_encoding("\0", "UTF-16LE"),true,"UTF-16LE"),"UTF-8", "UTF-16LE"); }
	public function getCurrentTrainerIsFemale($entity){              return unpack('C1out',substr($entity->file->bin,0x92,1))['out']; }
	public function getCurrentTrainerIsNotOriginalTrainer($entity){  return unpack('C1out',substr($entity->file->bin,0x93,1))['out']; }
	public function getGeolocation1($entity){                        return unpack('v1out',substr($entity->file->bin,0x94,2))['out']; }
	public function getGeolocation2($entity){                        return unpack('v1out',substr($entity->file->bin,0x96,2))['out']; }
	public function getGeolocation3($entity){                        return unpack('v1out',substr($entity->file->bin,0x98,2))['out']; }
	public function getGeolocation4($entity){                        return unpack('v1out',substr($entity->file->bin,0x9A,2))['out']; }
	public function getGeolocation5($entity){                        return unpack('v1out',substr($entity->file->bin,0x9C,2))['out']; }
	public function getCurrentTrainerFriendship($entity){            return unpack('C1out',substr($entity->file->bin,0xA2,1))['out']; }
	public function getCurrentTrainerAffection($entity){             return unpack('C1out',substr($entity->file->bin,0xA3,1))['out']; }
	public function getCurrentTrainerMemoryIntensity($entity){       return unpack('C1out',substr($entity->file->bin,0xA4,1))['out']; }
	public function getCurrentTrainerMemoryLine($entity){            return unpack('C1out',substr($entity->file->bin,0xA5,1))['out']; }
	public function getCurrentTrainerMemoryFeeling($entity){         return unpack('C1out',substr($entity->file->bin,0xA6,1))['out']; }
	public function getCurrentTrainerMemoryTextVar($entity){         return unpack('v1out',substr($entity->file->bin,0xA8,2))['out']; }
	public function getFullness($entity){                            return unpack('C1out',substr($entity->file->bin,0xAE,1))['out']; }
	public function getEnjoyment($entity){                           return unpack('C1out',substr($entity->file->bin,0xAF,1))['out']; }
	// Block D
	public function getOriginalTrainerName($entity){                 return mb_convert_encoding(mb_strstr(substr($entity->file->bin,0xB0,26),mb_convert_encoding("\0", "UTF-16LE"),true,"UTF-16LE"),"UTF-8", "UTF-16LE"); }
	public function getOriginalTrainerFriendship($entity){           return unpack('C1out',substr($entity->file->bin,0xCA,1))['out']; }
	public function getOriginalTrainerAffection($entity){            return unpack('C1out',substr($entity->file->bin,0xCB,1))['out']; }
	public function getOriginalTrainerMemoryIntensity($entity){      return unpack('C1out',substr($entity->file->bin,0xCC,1))['out']; }
	public function getOriginalTrainerMemoryLine($entity){           return unpack('C1out',substr($entity->file->bin,0xCD,1))['out']; }
	public function getOriginalTrainerMemoryTextVar($entity){        return unpack('v1out',substr($entity->file->bin,0xCE,2))['out']; }
	public function getOriginalTrainerMemoryFeeling($entity){        return unpack('C1out',substr($entity->file->bin,0xD0,1))['out']; }
	public function getDateEggRecieved($entity){                     return unpack('C1year/C1month/C1day',substr($entity->file->bin,0xD1,3)); }
	public function getDateMet($entity){                             return unpack('C1year/C1month/C1day',substr($entity->file->bin,0xD4,3)); }
	public function getEggLocation($entity){                         return unpack('v1out',substr($entity->file->bin,0xD8,2))['out']; }
	public function getMetAtLocation($entity){                       return unpack('v1out',substr($entity->file->bin,0xDA,2))['out']; }
	public function getPokeball($entity){                            return unpack('C1out',substr($entity->file->bin,0xDC,1))['out']; }
	public function getEncounterLevelOriginalTrainerGender($entity){ return unpack('C1out',substr($entity->file->bin,0xDD,1))['out']; }
	public function getEncounterLevel($entity){                      return $entity->getEncounterLevelOriginalTrainerGender() & 127; }
	public function getOriginalTrainerIsFemale($entity){             return $entity->getEncounterLevelOriginalTrainerGender() & 128; }
	public function getEncounterType($entity){                       return unpack('C1out',substr($entity->file->bin,0xDE,1))['out']; }
	public function getOriginalTrainerGameId($entity){               return unpack('C1out',substr($entity->file->bin,0xDF,1))['out']; }
	public function getCountryId($entity){                           return unpack('C1out',substr($entity->file->bin,0xE0,1))['out']; }
	public function getRegionId($entity){                            return unpack('C1out',substr($entity->file->bin,0xE1,1))['out']; }
	public function get3DSRegionId($entity){                         return unpack('C1out',substr($entity->file->bin,0xE2,1))['out']; }
	public function getOriginalTrainerLanguageId($entity){           return unpack('C1out',substr($entity->file->bin,0xE3,1))['out']; }
	

	public $validates = array(
		'fileSize' => array(
			array(
				'inList',
				'message' => 'Unrecognized file size.',
				'required' => true,
				'list' => array(
					232, // Box Data
					260  // Party Data
					)
				)
			),
		'checksumValidates' => array(
				array('boolean'),
				array(
					'inList',
					'message' => 'Invalid Checksum.  Try another file.',
					'required' => true,
					'list' => array( true )
				)
			)
		);
	protected $_schema = array(
		'_id'                                => array('type' => 'id'),
		'file'                               => array('type' => 'binary',  'default' => null, 'null' => false),
		'fileSize'                           => array('type' => 'integer', 'default' => null, 'null' => false),
		'dexId'                              => array('type' => 'integer', 'null' => true),
		'heldItem'                           => array('type' => 'integer', 'null' => true),
		'originalTrainerId'                  => array('type' => 'integer', 'null' => true),
		'originalTrainerSecretId'            => array('type' => 'integer', 'null' => true),
		'experience'                         => array('type' => 'integer', 'null' => true),
		'ability'                            => array('type' => 'integer', 'null' => true),
		'abilityNumber'                      => array('type' => 'integer', 'null' => true),
		'trainingBag'                        => array('type' => 'integer', 'null' => true),
		'trainingBagHitsRemaining'           => array('type' => 'integer', 'null' => true),
		'personality'                        => array('type' => 'integer', 'null' => true),
		'nature'                             => array('type' => 'integer', 'null' => true),
		'fatefulEncounter'                   => array('type' => 'integer', 'null' => true),
		'form'                               => array('type' => 'integer', 'null' => true),
		'female'                             => array('type' => 'boolean', 'null' => true),
		'genderless'                         => array('type' => 'boolean', 'null' => true),
		'HPEffortValue'                      => array('type' => 'integer', 'null' => true),
		'AttackEffortValue'                  => array('type' => 'integer', 'null' => true),
		'DefenseEffortValue'                 => array('type' => 'integer', 'null' => true),
		'SpeedEffortValue'                   => array('type' => 'integer', 'null' => true),
		'SpecialAttackEffortValue'           => array('type' => 'integer', 'null' => true),
		'SpecialDefenseEffortValue'          => array('type' => 'integer', 'null' => true),
		'contestStatsCool'                   => array('type' => 'integer', 'null' => true),
		'contestStatsBeauty'                 => array('type' => 'integer', 'null' => true),
		'contestStatsCute'                   => array('type' => 'integer', 'null' => true),
		'contestStatsSmart'                  => array('type' => 'integer', 'null' => true),
		'contestStatsTough'                  => array('type' => 'integer', 'null' => true),
		'contestStatsSheen'                  => array('type' => 'integer', 'null' => true),
		'markings'                           => array('type' => 'integer', 'null' => true),
		'pokerus'                            => array('type' => 'integer', 'null' => true),
		'superTrainingFlags'                 => array('type' => 'integer', 'null' => true),
		'ribbons'                            => array('type' => 'string',  'null' => true),
		'contestMemoryRibbonCount'           => array('type' => 'integer', 'null' => true),
		'battleMemoryRibbonCount'            => array('type' => 'integer', 'null' => true),
		'distributionTrainingFlags'          => array('type' => 'integer', 'null' => true),
		'nickname'                           => array('type' => 'string',  'null' => true),
		'move1'                              => array('type' => 'integer', 'null' => true),
		'move2'                              => array('type' => 'integer', 'null' => true),
		'move3'                              => array('type' => 'integer', 'null' => true),
		'move4'                              => array('type' => 'integer', 'null' => true),
		'move1PP'                            => array('type' => 'integer', 'null' => true),
		'move2PP'                            => array('type' => 'integer', 'null' => true),
		'move3PP'                            => array('type' => 'integer', 'null' => true),
		'move4PP'                            => array('type' => 'integer', 'null' => true),
		'move1PPUp'                          => array('type' => 'integer', 'null' => true),
		'move2PPUp'                          => array('type' => 'integer', 'null' => true),
		'move3PPUp'                          => array('type' => 'integer', 'null' => true),
		'move4PPUp'                          => array('type' => 'integer', 'null' => true),
		'relearnMove1'                       => array('type' => 'integer', 'null' => true),
		'relearnMove2'                       => array('type' => 'integer', 'null' => true),
		'relearnMove3'                       => array('type' => 'integer', 'null' => true),
		'relearnMove4'                       => array('type' => 'integer', 'null' => true),
		'superSecretTrainingFlag'            => array('type' => 'integer', 'null' => true),
		'hpIndividualValue'                  => array('type' => 'integer', 'null' => true),
		'attackIndividualValue'              => array('type' => 'integer', 'null' => true),
		'defenseIndividualValue'             => array('type' => 'integer', 'null' => true),
		'speedIndividualValue'               => array('type' => 'integer', 'null' => true),
		'specialAttackIndividualValue'       => array('type' => 'integer', 'null' => true),
		'specialDefenseIndividualValue'      => array('type' => 'integer', 'null' => true),
		'isEgg'                              => array('type' => 'boolean', 'null' => true),
		'isNicknamed'                        => array('type' => 'boolean', 'null' => true),
		'currentTrainerName'                 => array('type' => 'string',  'null' => true),
		'currentTrainerIsFemale'             => array('type' => 'boolean', 'null' => true),
		'geolocation1'                       => array('type' => 'integer', 'null' => true),
		'geolocation2'                       => array('type' => 'integer', 'null' => true),
		'geolocation3'                       => array('type' => 'integer', 'null' => true),
		'geolocation4'                       => array('type' => 'integer', 'null' => true),
		'geolocation5'                       => array('type' => 'integer', 'null' => true),
		'currentTrainerFriendship'           => array('type' => 'integer', 'null' => true),
		'currentTrainerAffection'            => array('type' => 'integer', 'null' => true),
		'currentTrainerIsNotOriginalTrainer' => array('type' => 'boolean', 'null' => true),
		'currentTrainerMemoryIntensity'      => array('type' => 'integer', 'null' => true),
		'currentTrainerMemoryLine'           => array('type' => 'integer', 'null' => true),
		'currentTrainerMemoryFeeling'        => array('type' => 'integer', 'null' => true),
		'currentTrainerMemoryTextVar'        => array('type' => 'integer', 'null' => true),
		'fullness'                           => array('type' => 'integer', 'null' => true),
		'enjoyment'                          => array('type' => 'integer', 'null' => true),
		'originalTrainerName'                => array('type' => 'string',  'null' => true),
		'originalTrainerFriendship'          => array('type' => 'integer', 'null' => true),
		'originalTrainerAffection'           => array('type' => 'integer', 'null' => true),
		'originalTrainerMemoryIntensity'     => array('type' => 'integer', 'null' => true),
		'originalTrainerMemoryLine'          => array('type' => 'integer', 'null' => true),
		'originalTrainerMemoryTextVar'       => array('type' => 'integer', 'null' => true),
		'originalTrainerMemoryFeeling'       => array('type' => 'integer', 'null' => true),
		//'dateEggRecieved'                    => array('type' => 'integer', 'null' => true),
		//'dateMet'                            => array('type' => 'integer', 'null' => true),
		'eggLocation'                        => array('type' => 'integer', 'null' => true),
		'metAtLocation'                      => array('type' => 'integer', 'null' => true),
		'pokeball'                           => array('type' => 'integer', 'null' => true),
		'encounterLevel'                     => array('type' => 'integer', 'null' => true),
		'originalTrainerIsFemale'            => array('type' => 'boolean', 'null' => true),
		'encounterType'                      => array('type' => 'integer', 'null' => true),
		'originalTrainerGameId'              => array('type' => 'integer', 'null' => true),
		'countryId'                          => array('type' => 'integer', 'null' => true),
		'regionId'                           => array('type' => 'integer', 'null' => true),
		'3dsRegionId'                        => array('type' => 'integer', 'null' => true),
		'originalTrainerLanguageId'          => array('type' => 'integer', 'null' => true)
		);
		
	public function validateChecksum($entity)
	{
		return (array_sum(unpack("v*",substr($entity->file->bin,0x08,224))) % 65536) === $entity->getChecksum();
	}
	public function cachePokemonData($entity)
	{
		$entity->dexId                              = $entity->getDexId();
		$entity->heldItem                           = $entity->getHeldItem();
		$entity->originalTrainerId                  = $entity->getOriginalTrainerId();
		$entity->originalTrainerSecretId            = $entity->getOriginalTrainerSecretId();
		$entity->experience                         = $entity->getExperience();
		$entity->ability                            = $entity->getAbility();
		$entity->abilityNumber                      = $entity->getAbilityNumber();
		$entity->trainingBag                        = $entity->getTrainingBag();
		$entity->trainingBagHitsRemaining           = $entity->getTrainingBagHitsRemaining();
		$entity->personality                        = $entity->getPersonality();
		$entity->nature                             = $entity->getNature();
		$entity->fatefulEncounter                   = $entity->getFatefulEncounter();
		$entity->form                               = $entity->getForm();
		$entity->female                             = $entity->getFemale();
		$entity->genderless                         = $entity->getGenderless();
		$entity->HPEffortValue                      = $entity->getHPEffortValue();
		$entity->AttackEffortValue                  = $entity->getAttackEffortValue();
		$entity->DefenseEffortValue                 = $entity->getDefenseEffortValue();
		$entity->SpeedEffortValue                   = $entity->getSpeedEffortValue();
		$entity->SpecialAttackEffortValue           = $entity->getSpecialAttackEffortValue();
		$entity->SpecialDefenseEffortValue          = $entity->getSpecialDefenseEffortValue();
		$entity->contestStatsCool                   = $entity->getContestStatsCool();
		$entity->contestStatsBeauty                 = $entity->getContestStatsBeauty();
		$entity->contestStatsCute                   = $entity->getContestStatsCute();
		$entity->contestStatsSmart                  = $entity->getContestStatsSmart();
		$entity->contestStatsTough                  = $entity->getContestStatsTough();
		$entity->contestStatsSheen                  = $entity->getContestStatsSheen();
		$entity->markings                           = $entity->getMarkings();
		$entity->pokerus                            = $entity->getPokerus();
		$entity->superTrainingFlags                 = $entity->getSuperTrainingFlags();
		$entity->ribbons                            = $entity->getRibbons();
		$entity->contestMemoryRibbonCount           = $entity->getContestMemoryRibbonCount();
		$entity->battleMemoryRibbonCount            = $entity->getBattleMemoryRibbonCount();
		$entity->distributionTrainingFlags          = $entity->getDistributionTrainingFlags();
		$entity->nickname                           = $entity->getNickname();
		$entity->move1                              = $entity->getMove1();
		$entity->move2                              = $entity->getMove2();
		$entity->move3                              = $entity->getMove3();
		$entity->move4                              = $entity->getMove4();
		$entity->move1PP                            = $entity->getMove1PP();
		$entity->move2PP                            = $entity->getMove2PP();
		$entity->move3PP                            = $entity->getMove3PP();
		$entity->move4PP                            = $entity->getMove4PP();
		$entity->move1PPUp                          = $entity->getMove1PPUp();
		$entity->move2PPUp                          = $entity->getMove2PPUp();
		$entity->move3PPUp                          = $entity->getMove3PPUp();
		$entity->move4PPUp                          = $entity->getMove4PPUp();
		$entity->relearnMove1                       = $entity->getRelearnMove1();
		$entity->relearnMove2                       = $entity->getRelearnMove2();
		$entity->relearnMove3                       = $entity->getRelearnMove3();
		$entity->relearnMove4                       = $entity->getRelearnMove4();
		$entity->superSecretTrainingFlag            = $entity->getSuperSecretTrainingFlag();
		$entity->hpIndividualValue                  = $entity->getHPIndividualValue();
		$entity->attackIndividualValue              = $entity->getAttackIndividualValue();
		$entity->defenseIndividualValue             = $entity->getDefenseIndividualValue();
		$entity->speedIndividualValue               = $entity->getSpeedIndividualValue();
		$entity->specialAttackIndividualValue       = $entity->getSpecialAttackIndividualValue();
		$entity->specialDefenseIndividualValue      = $entity->getSpecialDefenseIndividualValue();
		$entity->isEgg                              = $entity->getIsEgg();
		$entity->isNicknamed                        = $entity->getIsNicknamed();
		$entity->currentTrainerName                 = $entity->getCurrentTrainerName();
		$entity->currentTrainerIsFemale             = $entity->getCurrentTrainerIsFemale();
		$entity->geolocation1                       = $entity->getGeolocation1();
		$entity->geolocation2                       = $entity->getGeolocation2();
		$entity->geolocation3                       = $entity->getGeolocation3();
		$entity->geolocation4                       = $entity->getGeolocation4();
		$entity->geolocation5                       = $entity->getGeolocation5();
		$entity->currentTrainerFriendship           = $entity->getCurrentTrainerFriendship();
		$entity->currentTrainerAffection            = $entity->getCurrentTrainerAffection();
		$entity->currentTrainerIsNotOriginalTrainer = $entity->getCurrentTrainerIsNotOriginalTrainer();
		$entity->currentTrainerMemoryIntensity      = $entity->getCurrentTrainerMemoryIntensity();
		$entity->currentTrainerMemoryLine           = $entity->getCurrentTrainerMemoryLine();
		$entity->currentTrainerMemoryFeeling        = $entity->getCurrentTrainerMemoryFeeling();
		$entity->currentTrainerMemoryTextVar        = $entity->getCurrentTrainerMemoryTextVar();
		$entity->fullness                           = $entity->getFullness();
		$entity->enjoyment                          = $entity->getEnjoyment();
		$entity->originalTrainerName                = $entity->getOriginalTrainerName();
		$entity->originalTrainerFriendship          = $entity->getOriginalTrainerFriendship();
		$entity->originalTrainerAffection           = $entity->getOriginalTrainerAffection();
		$entity->originalTrainerMemoryIntensity     = $entity->getOriginalTrainerMemoryIntensity();
		$entity->originalTrainerMemoryLine          = $entity->getOriginalTrainerMemoryLine();
		$entity->originalTrainerMemoryTextVar       = $entity->getOriginalTrainerMemoryTextVar();
		$entity->originalTrainerMemoryFeeling       = $entity->getOriginalTrainerMemoryFeeling();
		//$entity->dateEggRecieved                    = $entity->getDateEggRecieved();
		//$entity->dateMet                            = $entity->getDateMet();
		$entity->eggLocation                        = $entity->getEggLocation();
		$entity->metAtLocation                      = $entity->getMetAtLocation();
		$entity->pokeball                           = $entity->getPokeball();
		$entity->encounterLevel                     = $entity->getEncounterLevel();
		$entity->originalTrainerIsFemale            = $entity->getOriginalTrainerIsFemale();
		$entity->encounterType                      = $entity->getEncounterType();
		$entity->originalTrainerGameId              = $entity->getOriginalTrainerGameId();
		$entity->countryId                          = $entity->getCountryId();
		$entity->regionId                           = $entity->getRegionId();
		$entity->threedsRegionId                    = $entity->get3DSRegionId();
		$entity->originalTrainerLanguageId          = $entity->getOriginalTrainerLanguageId();
	}
}