<?php

declare(strict_types=1);

namespace Eduard9969\BladeShopifyIcons\Tests;

use BladeUI\Icons\BladeIconsServiceProvider;
use Eduard9969\BladeShopifyIcons\BladeShopifyIconsServiceProvider;
use Orchestra\Testbench\TestCase;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_stub()
    {
        $this->assertTrue(true);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeShopifyIconsServiceProvider::class,
        ];
    }
}
