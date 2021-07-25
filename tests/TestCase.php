<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Reviews.
 *
 * (c) Konceiver <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\Reviews\Tests;

use Konceiver\Reviews\Providers\ReviewsServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [ReviewsServiceProvider::class];
    }
}
