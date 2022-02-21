<?php

use Symfony\Component\Finder\SplFileInfo;
use Codeat3\BladeIconGeneration\IconProcessor;

$svgNormalization = static function (string $tempFilepath, array $iconSet, SplFileInfo $file) {

    // perform generic optimizations
    $iconProcessor = new IconProcessor($tempFilepath, $iconSet, $file);
    $iconProcessor
        ->convertStyleToInline()
        ->optimize()
        ->postOptimizationAsString(function ($svgLine) {
            return str_replace('fill:#000000', 'fill:currentColor', $svgLine);
        })
        ->save();
};

return [
    [
        'source' => __DIR__.'/../node_modules/@shopify/polaris-icons/dist/svg',

        'destination' => __DIR__.'/../resources/svg',

        'safe' => false,

        'after' => $svgNormalization,
    ],
];
