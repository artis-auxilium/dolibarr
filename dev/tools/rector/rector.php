<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
	$rectorConfig->phpVersion(PhpVersion::PHP_71);
	//$rectorConfig->indent(' ', 4);

	// Traits seems not supported correctly by rector without declaring them as bootstrapFiles
	$arrayoftraitfiles = array(
		__DIR__ . '/../../../htdocs/core/class/commonincoterm.class.php',
		__DIR__ . '/../../../htdocs/core/class/commonpeople.class.php',
		__DIR__ . '/../../../htdocs/core/class/commonsocialnetworks.class.php'
	);
	$rectorConfig->bootstrapFiles($arrayoftraitfiles);

	$rectorConfig->paths([
		__DIR__ . '/../../../htdocs/',
		__DIR__ . '/../../../scripts/',
		__DIR__ . '/../../../test/phpunit/',
	]);
	$rectorConfig->skip([
		'**/includes/**',
		'**/custom/**',
		'**/vendor/**',
		'**/rector/**',		// Disable this line to test the "test.php" file.
		__DIR__ . '/../../../htdocs/custom/',
		__DIR__ . '/../../../htdocs/install/doctemplates/*'
	]);
	$rectorConfig->parallel(240);


	// Register rules
	$rectorConfig->sets([
		Dolibarr\Rector\Set\SetList::CODE_QUALITY,
		Dolibarr\Rector\Set\SetLevelList::UP_TO_DOL20,
		LevelSetList::UP_TO_PHP_74,
		// Add all predefined rules to migrate to up to php 71.
		// Warning this break tab spacing of arrays on several lines
		// LevelSetList::UP_TO_PHP_70,
	]);
	// Add predefined rules for a given version only
	//$rectorConfig->import(SetList::PHP_70);
	//$rectorConfig->import(SetList::PHP_71);
	//$rectorConfig->import(SetList::PHP_72);
	//$rectorConfig->import(SetList::PHP_73);
	//$rectorConfig->import(SetList::PHP_74);
	//$rectorConfig->import(SetList::PHP_80);
	//$rectorConfig->import(SetList::PHP_81);
	//$rectorConfig->import(SetList::PHP_82);
	//$rectorConfig->import(SetList::PHP_83);
};
