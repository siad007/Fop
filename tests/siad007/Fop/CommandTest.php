<?php

namespace siad007\Fop\Tests;

use \PHPUnit_Framework_TestCase as TestCase;
use siad007\Fop\Command;
use siad007\Fop\Arguments;
use siad007\Fop\Options;

class CommandTest extends TestCase
{
    /**
     * @var Command
     */
    protected $command = null;

    protected function setUp()
    {
        $args = new Arguments();
        $args['pdf'] = __DIR__ . '/../_files/test.pdf';
        $args['fo'] = __DIR__ . '/../_files/test.fo';
        $opts = new Options();
        $opts->setVerbose(true);
        $this->command = new Command($args, $opts);
    }

    protected function tearDown()
    {
        if (is_file(__DIR__ . '/../_files/test.pdf')) {
            unlink(__DIR__ . '/../_files/test.pdf');
        }
    }

    /**
     * @test
     */
    public function generalFunctionality()
    {
        $this->command->generatePdf();

        $this->assertFileExists(
            __DIR__ . '/../_files/test.pdf',
            'Couldn\'t generate PDF.'
        );
    }

    /**
     * @test
     */
    public function commandSyntax()
    {
        $cmd = (string) $this->command;

        $this->assertStringEndsWith('_files/test.pdf', $cmd);
    }
}
