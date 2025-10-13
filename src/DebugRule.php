<?php

declare(strict_types=1);

namespace Korbeil\GenericRules;

use PhpParser\Node;
use PHPStan\Rules\Rule;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @implements Rule<Node\Expr\FuncCall>
 */
class DebugRule extends GenericFunctionRule implements Rule
{
    /** @var array<string, bool> */
    protected static $functionsToAvoid = [
        'die' => true,
        'exit' => true,
        'var_dump' => true,
    ];

    /**
     * @var string
     */
    protected static $identifier = 'korbeil.debug';

    public function __construct(bool $enabled = true)
    {
        parent::__construct($enabled);

        if (\class_exists(VarDumper::class)) {
            self::$functionsToAvoid['dump'] = true;
            self::$functionsToAvoid['dd'] = true;
        }
    }
}
