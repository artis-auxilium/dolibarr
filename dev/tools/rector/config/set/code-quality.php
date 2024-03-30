<?php


use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig) : void {
	$rectorConfig->rule(Rector\CodeQuality\Rector\FuncCall\FloatvalToTypeCastRector::class);
	$rectorConfig->rule(Rector\CodeQuality\Rector\FuncCall\BoolvalToTypeCastRector::class);
	$rectorConfig->rule(Rector\CodeQuality\Rector\NotEqual\CommonNotEqualRector::class);
	//$rectorConfig->rule(Rector\Php71\Rector\List_\ListToArrayDestructRector::class);
	//$rectorConfig->rule(Rector\Php72\Rector\FuncCall\CreateFunctionToAnonymousFunctionRector::class);
	//$rectorConfig->rule(Rector\Php72\Rector\FuncCall\GetClassOnNullRector::class);
	//$rectorConfig->rule(Rector\Php72\Rector\Assign\ListEachRector::class);
	//$rectorConfig->rule(Rector\Php72\Rector\FuncCall\ParseStrWithResultArgumentRector::class);
	//$rectorConfig->rule(Rector\Php72\Rector\FuncCall\StringifyDefineRector::class);
	//$rectorConfig->rule(ReplaceEachAssignmentWithKeyCurrentRector::class);
	//Not yet ready: $rectorconfig->rule(Rector\CodeQuality\Rector\If_\CompleteMissingIfElseBracketRector::class);
	$rectorConfig->rule(Rector\CodeQuality\Rector\For_\ForRepeatedCountToOwnVariableRector::class);

};
