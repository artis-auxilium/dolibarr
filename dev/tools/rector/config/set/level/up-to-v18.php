<?php


use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig) : void {
	$rectorConfig->rule(Dolibarr\Rector\Renaming\EmptyGlobalToFunction::class);
	$rectorConfig->rule(Dolibarr\Rector\Renaming\EmptyUserRightsToFunction::class);
	$rectorConfig->rule(Dolibarr\Rector\Renaming\GlobalToFunction::class);
	$rectorConfig->rule(Dolibarr\Rector\Renaming\UserRightsToFunction::class);
};
