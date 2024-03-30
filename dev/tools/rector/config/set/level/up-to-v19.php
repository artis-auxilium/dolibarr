<?php


use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig) : void {
	$rectorConfig->sets([\Dolibarr\Rector\Set\SetLevelList::UP_TO_DOL18]);
};
