<?php

declare(strict_types=1);

namespace Korbeil\GenericRules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @implements Rule<Node\Expr\FuncCall>
 */
class DebugRule implements Rule
{
    /** @var array<string, bool> */
    private static $functionsToAvoid = [
        'die' => true,
        'exit' => true,
        'var_dump' => true,
    ];

    /**
     * @var bool
     */
    private $enabled;

    public function __construct(bool $enabled = true)
    {
        $this->enabled = $enabled;

        if (\class_exists(VarDumper::class)) {
            self::$functionsToAvoid['dump'] = true;
            self::$functionsToAvoid['dd'] = true;
        }
    }

    public function getNodeType(): string
    {
        return Node\Expr\FuncCall::class;
    }

    /**
     * @param Node\Expr\FuncCall $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$this->enabled) {
            return [];
        }

        $errors = [];
        if ($node->name instanceof Node\Name && array_key_exists($node->name->getLast(), self::$functionsToAvoid)) {
            $errors[] = RuleErrorBuilder::message(sprintf('You should not use debug function (%s)', $node->name->getLast()))
                ->identifier('korbeil.debug')
                ->build();
        }

        return $errors;
    }
}
