<?php

declare(strict_types=1);

namespace Korbeil\GenericRules;

use PhpParser\Node;
use PHPStan\Rules\Rule;

/**
 * @implements Rule<Node\Expr\FuncCall>
 */
class NeverEmptyRule extends GenericFunctionRule implements Rule
{
    protected static $functionsToAvoid = [
        'empty' => true,
    ];

    protected static $identifier = 'korbeil.empty';
}
