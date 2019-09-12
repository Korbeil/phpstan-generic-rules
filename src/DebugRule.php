<?php

declare(strict_types=1);

namespace PHPStan\GenericRules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use Symfony\Component\VarDumper\VarDumper;

class DebugRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\FuncCall::class;
    }

    /**
     * @return array|string[]
     */
    private function getFunctionsToAvoid(): array
    {
        $functions = ['var_dump', 'exit', 'die'];

        if (\class_exists(VarDumper::class)) {
            $functions[] = 'dump';
            $functions[] = 'dd';
        }

        return $functions;
    }

    /**
     * @param Node\Expr\FuncCall $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        $errors = [];
        if ($node->name instanceof Node\Name &&
            true === \in_array($node->name->getLast(), $functionsToAvoid = $this->getFunctionsToAvoid())) {
            $errors[] = sprintf('You should remove debug method calls. (%s)', implode(', ', $functionsToAvoid));
        }

        return $errors;
    }
}
