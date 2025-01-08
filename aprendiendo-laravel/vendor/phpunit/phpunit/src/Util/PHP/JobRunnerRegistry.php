<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\PHP;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class JobRunnerRegistry
{
    private static ?JobRunner $runner = null;

    public static function run(Job $job): Result
    {
        if (self::$runner === null) {
            self::$runner = new DefaultJobRunner;
        }

        return self::$runner->run($job);
    }

    public static function set(JobRunner $runner): void
    {
        self::$runner = $runner;
    }
}
