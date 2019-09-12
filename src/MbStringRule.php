<?php

declare(strict_types=1);

namespace PHPStan\GenericRules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

class MbStringRule implements Rule
{
    private const FUNCTIONS_TO_AVOID = [
        'stripos' => true,
        'stristr' => true,
        'strlen' => true,
        'strpos' => true,
        'strrchr' => true,
        'strripos' => true,
        'strrpos' => true,
        'strstr' => true,
        'strtolower' => true,
        'strtoupper' => true,
        'substr_count' => true,
        'substr' => true,
    ];

    public function getNodeType(): string
    {
        return Node\Expr\FuncCall::class;
    }

    /**
     * @param Node\Expr\FuncCall $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        $errors = [];
        if ($node->name instanceof Node\Name && \array_key_exists($node->name->getLast(), self::FUNCTIONS_TO_AVOID)) {
            $errors[] = sprintf('You should use mb_%s function instead of %s.', $node->name->getLast(), $node->name->getLast());
        }

        return $errors;
    }
}
