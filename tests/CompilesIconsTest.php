<?php

declare(strict_types=1);

namespace Tests;

use BladeUI\Icons\BladeIconsServiceProvider;
use Eduard9969\BladePolarisIcons\BladePolarisIconsServiceProvider;
use Orchestra\Testbench\TestCase;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('cartabandonedicon')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3.25 3a.75.75 0 0 0 0 1.5h1.612a.25.25 0 0 1 .248.22l1.04 8.737a1.75 1.75 0 0 0 1.738 1.543h6.362a.75.75 0 0 0 0-1.5h-6.362a.25.25 0 0 1-.248-.22l-.093-.78h6.35a2.75 2.75 0 0 0 2.743-2.54l.358-4.652a.75.75 0 0 0-1.496-.116l-.358 4.654a1.25 1.25 0 0 1-1.246 1.154h-6.53l-.768-6.457a1.75 1.75 0 0 0-1.738-1.543h-1.612Z"/><path d="M8.87 5.12a.75.75 0 0 0 0 1.06l1.32 1.32-1.32 1.32a.75.75 0 1 0 1.06 1.06l1.32-1.32 1.32 1.32a.75.75 0 0 0 1.06-1.06l-1.32-1.32 1.32-1.32a.75.75 0 0 0-1.06-1.06l-1.32 1.32-1.32-1.32a.75.75 0 0 0-1.06 0Z"/><path d="M10 17a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/><path d="M15 17a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('cartabandonedicon', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3.25 3a.75.75 0 0 0 0 1.5h1.612a.25.25 0 0 1 .248.22l1.04 8.737a1.75 1.75 0 0 0 1.738 1.543h6.362a.75.75 0 0 0 0-1.5h-6.362a.25.25 0 0 1-.248-.22l-.093-.78h6.35a2.75 2.75 0 0 0 2.743-2.54l.358-4.652a.75.75 0 0 0-1.496-.116l-.358 4.654a1.25 1.25 0 0 1-1.246 1.154h-6.53l-.768-6.457a1.75 1.75 0 0 0-1.738-1.543h-1.612Z"/><path d="M8.87 5.12a.75.75 0 0 0 0 1.06l1.32 1.32-1.32 1.32a.75.75 0 1 0 1.06 1.06l1.32-1.32 1.32 1.32a.75.75 0 0 0 1.06-1.06l-1.32-1.32 1.32-1.32a.75.75 0 0 0-1.06-1.06l-1.32 1.32-1.32-1.32a.75.75 0 0 0-1.06 0Z"/><path d="M10 17a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/><path d="M15 17a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('cartabandonedicon', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3.25 3a.75.75 0 0 0 0 1.5h1.612a.25.25 0 0 1 .248.22l1.04 8.737a1.75 1.75 0 0 0 1.738 1.543h6.362a.75.75 0 0 0 0-1.5h-6.362a.25.25 0 0 1-.248-.22l-.093-.78h6.35a2.75 2.75 0 0 0 2.743-2.54l.358-4.652a.75.75 0 0 0-1.496-.116l-.358 4.654a1.25 1.25 0 0 1-1.246 1.154h-6.53l-.768-6.457a1.75 1.75 0 0 0-1.738-1.543h-1.612Z"/><path d="M8.87 5.12a.75.75 0 0 0 0 1.06l1.32 1.32-1.32 1.32a.75.75 0 1 0 1.06 1.06l1.32-1.32 1.32 1.32a.75.75 0 0 0 1.06-1.06l-1.32-1.32 1.32-1.32a.75.75 0 0 0-1.06-1.06l-1.32 1.32-1.32-1.32a.75.75 0 0 0-1.06 0Z"/><path d="M10 17a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/><path d="M15 17a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladePolarisIconsServiceProvider::class,
        ];
    }
}
