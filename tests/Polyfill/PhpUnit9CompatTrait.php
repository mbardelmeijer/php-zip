<?php

declare(strict_types=1);

namespace PhpZip\Tests\Polyfill;

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Runner\Version;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

trait PhpUnit9CompatTrait
{
    /**
     * Asserts that a file does not exist.
     *
     * @param string $filename
     * @param string $message
     *
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @noinspection PhpDeprecationInspection
     */
    public static function assertFileDoesNotExist(string $filename, string $message = ''): void
    {
        if (version_compare(Version::id(), '9.1.0', '<')) {
            static::assertFileNotExists($filename, $message);

            return;
        }

        parent::assertFileDoesNotExist($filename, $message);
    }

    /**
     * Asserts that a directory does not exist.
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     *
     * @noinspection PhpDeprecationInspection
     */
    public static function assertDirectoryDoesNotExist(string $directory, string $message = ''): void
    {
        if (version_compare(Version::id(), '9.1.0', '<')) {
            static::assertDirectoryNotExists($directory, $message);

            return;
        }

        parent::assertDirectoryDoesNotExist($directory, $message);
    }
}
