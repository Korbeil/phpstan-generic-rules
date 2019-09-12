<?php

declare(strict_types=1);

namespace PHPStan\GenericRules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

class MbStringRule implements Rule
{
    private const STRING_FUNCTIONS_MAPPING = [
        'stripos',
        'stristr',
        'strlen',
        'strpos',
        'strrchr',
        'strripos',
        'strrpos',
        'strstr',
        'strtolower',
        'strtoupper',
        'substr_count',
        'substr',
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
        if ($node->name instanceof Node\Name) {
            foreach (self::STRING_FUNCTIONS_MAPPING as $stringFunction) {
                if ($stringFunction === $node->name->getLast()) {
                    $errors[] = sprintf('You should use mb_%s function instead of %s.', $stringFunction, $stringFunction);
                }
            }
        }

        return $errors;
    }
}
