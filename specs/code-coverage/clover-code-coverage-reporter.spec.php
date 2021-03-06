<?php

use Evenement\EventEmitter;
use Peridot\Configuration;
use Peridot\Reporter\CodeCoverage\CloverCodeCoverageReporter;
use SebastianBergmann\CodeCoverage\Report\Clover;
use Symfony\Component\Console\Output\ConsoleOutput;

describe('CloverCodeCoverageReporter', function () {

    beforeEach(function () {
        $this->reporter = new CloverCodeCoverageReporter(
            new Configuration(),
            new ConsoleOutput(),
            new EventEmitter()
        );
    });

    it('should create a clover style php code coverage reporter', function () {
        assert($this->reporter->getCoverageReporter() instanceof Clover);
    });

    it('should define the default path to the clover.xml output file', function () {
        assert($this->reporter->getReportPath() == 'coverage/clover.xml');
    });

});
