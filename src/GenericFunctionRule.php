<?php

declare(strict_types=1);

namespace Korbeil\GenericRules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\RuleError;
use PHPStan\Rules\RuleErrorBuilder;

abstract class GenericFunctionRule
{
    /** @var array<string, bool> */
    protected static $functionsToAvoid = [];

    /**
     * @var string
     */
    protected static $identifier = 'korbeil.generic_function';

    /**
     * @var bool
     */
    private $enabled;

    public function __construct(bool $enabled = true)
    {
        $this->enabled = $enabled;
    }

    public function getNodeType(): string
    {
        return Node\Expr\FuncCall::class;
    }

    /**
     * @param Node\Expr\FuncCall $node
     *
     * @return RuleError[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->enabled) {
            return [];
        }

        $errors = [];
        if ($node->name instanceof Node\Name && array_key_exists($node->name->getLast(), self::$functionsToAvoid)) {
            $errors[] = RuleErrorBuilder::message(sprintf('You should not use function (%s)', $node->name->getLast()))
                ->identifier(self::$identifier)
                ->build();
        }

        return $errors;
    }
}
