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
            return mb_strtolower(
                preg_replace('/([^A-Z-])([A-Z])/', '$1-$2', $name)
            );
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
