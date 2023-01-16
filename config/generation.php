<?php

use Codeat3\BladeIconGeneration\IconProcessor;
use Symfony\Component\Finder\SplFileInfo;

$svgNormalization = static function (string $tempFilepath, array $iconSet, SplFileInfo $file) {
    // perform generic optimizations
    $iconProcessor = new IconProcessor($tempFilepath, $iconSet, $file);
    $iconProcessor
        ->convertStyleToInline()
        ->optimize()
        ->postOptimizationAsString(function ($svgLine) {
            return preg_replace('(fill="([^"]+)")', 'fill="currentColor"', $svgLine);
        })
        ->save(function ($name, $file) {
            $callable = function ($matches) {
                return preg_replace(
                    '/(?<! )(?<!^)[A-Z]/',
                    '-$0',
                    "{$matches[2]}{$matches[1]}",
                );
            };

            return preg_replace_callback('/(.*)(Major|Minor)/', $callable, $name);
        });
};

return [
    [
        'source' => __DIR__ . '/../dist/polaris-icons/icons',

        'destination' => __DIR__ . '/../resources/svg',

        'safe' => false,

        'is-solid' => true,

        'after' => $svgNormalization,
    ],
];
