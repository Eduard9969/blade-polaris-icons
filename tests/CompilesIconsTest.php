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
        $result = svg('polaris-major-activities')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18.111.221a3.04 3.04 0 011.002.66h-.003a2.992 2.992 0 01.89 2.18c-.224 14.324-4.22 16.692-16.931 16.94h-.06c-.797 0-1.548-.31-2.12-.88A2.989 2.989 0 010 16.937C.226 2.615 4.22.248 16.932 0c.404-.005.805.07 1.179.221zM7.879 7.88a1 1 0 011.414 0l.708.707 1.414-1.414-.707-.707a1 1 0 011.414-1.414l.707.707 1.464-1.465a1 1 0 111.415 1.414l-1.465 1.465.707.707a1 1 0 01-1.414 1.414l-.707-.707L11.415 10l.707.707a1 1 0 11-1.414 1.415L10 11.415l-1.415 1.414.707.707A1 1 0 117.88 14.95l-.707-.707-1.464 1.464a1 1 0 01-1.415-1.414l1.465-1.464-.707-.707a1 1 0 111.414-1.415l.707.707L8.586 10l-.707-.707a1 1 0 010-1.414z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('polaris-major-activities', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18.111.221a3.04 3.04 0 011.002.66h-.003a2.992 2.992 0 01.89 2.18c-.224 14.324-4.22 16.692-16.931 16.94h-.06c-.797 0-1.548-.31-2.12-.88A2.989 2.989 0 010 16.937C.226 2.615 4.22.248 16.932 0c.404-.005.805.07 1.179.221zM7.879 7.88a1 1 0 011.414 0l.708.707 1.414-1.414-.707-.707a1 1 0 011.414-1.414l.707.707 1.464-1.465a1 1 0 111.415 1.414l-1.465 1.465.707.707a1 1 0 01-1.414 1.414l-.707-.707L11.415 10l.707.707a1 1 0 11-1.414 1.415L10 11.415l-1.415 1.414.707.707A1 1 0 117.88 14.95l-.707-.707-1.464 1.464a1 1 0 01-1.415-1.414l1.465-1.464-.707-.707a1 1 0 111.414-1.415l.707.707L8.586 10l-.707-.707a1 1 0 010-1.414z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('polaris-major-activities', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18.111.221a3.04 3.04 0 011.002.66h-.003a2.992 2.992 0 01.89 2.18c-.224 14.324-4.22 16.692-16.931 16.94h-.06c-.797 0-1.548-.31-2.12-.88A2.989 2.989 0 010 16.937C.226 2.615 4.22.248 16.932 0c.404-.005.805.07 1.179.221zM7.879 7.88a1 1 0 011.414 0l.708.707 1.414-1.414-.707-.707a1 1 0 011.414-1.414l.707.707 1.464-1.465a1 1 0 111.415 1.414l-1.465 1.465.707.707a1 1 0 01-1.414 1.414l-.707-.707L11.415 10l.707.707a1 1 0 11-1.414 1.415L10 11.415l-1.415 1.414.707.707A1 1 0 117.88 14.95l-.707-.707-1.464 1.464a1 1 0 01-1.415-1.414l1.465-1.464-.707-.707a1 1 0 111.414-1.415l.707.707L8.586 10l-.707-.707a1 1 0 010-1.414z" fill="currentColor"/></svg>
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
