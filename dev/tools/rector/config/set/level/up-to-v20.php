<?php


use Rector\Arguments\Rector\FuncCall\FunctionArgumentDefaultValueReplacerRector;
use Rector\Arguments\ValueObject\ReplaceFuncCallArgumentDefaultValue;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig) : void {
	$rectorConfig->sets([\Dolibarr\Rector\Set\SetLevelList::UP_TO_DOL19]);
	$moduleNames = [
		'actioncomm' => 'agenda',
		'adherent' => 'member',
		'adherent_type' => 'member_type',
		'banque' => 'bank',
		'categorie' => 'category',
		'commande' => 'order',
		'contrat' => 'contract',
		'entrepot' => 'stock',
		'expedition' => 'delivery_note',
		'facture' => 'invoice',
		'fichinter' => 'intervention',
		'product_fournisseur_price' => 'productsupplierprice',
		'product_price' => 'productprice',
		'projet'  => 'project',
		'propale' => 'propal',
		'socpeople' => 'contact',
	];
	$rectorConfig->ruleWithConfiguration(
		FunctionArgumentDefaultValueReplacerRector::class,
		array_map(function ($from, $to) {
			return new ReplaceFuncCallArgumentDefaultValue('isModEnabled', 0, $from, $to);
		}, array_keys($moduleNames), array_values($moduleNames))
	);
	$rectorConfig->rule(Dolibarr\Rector\Transform\HookManagerRefactor::class);
};
