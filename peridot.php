<?php

use Evenement\EventEmitterInterface;
use Peridot\Reporter\CodeCoverage\CodeCoverageReporter;
use Peridot\Reporter\CodeCoverageReporters;

/**
 * Configure peridot.
 *
 * @param EventEmitterInterface $eventEmitter
 */
return function (EventEmitterInterface $eventEmitter) {
    (new CodeCoverageReporters($eventEmitter))->register();

    $eventEmitter->on('peridot.start', function (\Peridot\Console\Environment $environment) {
        $environment->getDefinition()->getArgument('path')->setDefault('specs');
    });

    $eventEmitter->on('code-coverage.start', function (CodeCoverageReporter $reporter) {
        $reporter->addDirectoryToWhitelist(__DIR__ . '/src');
    });
};
