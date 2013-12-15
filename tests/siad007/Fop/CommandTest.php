<?php

namespace siad007\Fop\Tests;

use \PHPUnit_Framework_TestCase as TestCase;
use siad007\Fop\Command;
use siad007\Fop\Arguments;

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
        $this->command = new Command($args);
    }

    protected function tearDown()
    {
        unlink(__DIR__ . '/../_files/test.pdf');
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
}
