<?php

namespace Dolibarr\Rector\Transform;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\Exception\PoorDocumentationException;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

class HookManagerRefactor extends AbstractRector
{

	/**
	 * @throws PoorDocumentationException
	 */
	public function getRuleDefinition(): RuleDefinition
	{
		return new RuleDefinition(
			'Re factorise hookManager initialisation',
			[new CodeSample(
				'$hookmanager->initHooks(array("globalcard"));',
				'$hookmanager = HookManager::getInstance(array("globalcard"));'
			)]
		);
	}

	public function getNodeTypes(): array
	{
		return [MethodCall::class];
	}

	/**
	 * @param Node|MethodCall $node
	 * @return null|Node
	 */
	public function refactor(Node $node)
	{
		if (!$this->isName($node->name, 'initHooks') || !$this->isName($node->var, 'hookmanager')) {
			return null;
		}
		$hookmanager = new StaticCall(new Name('HookManager'), 'getInstance', $node->args);
		return new Node\Expr\Assign(new Node\Expr\Variable('hookmanager'), $hookmanager );
	}
}
