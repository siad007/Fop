<?php

namespace siad007\Fop\Tests;

use \PHPUnit_Framework_TestCase as TestCase;
use siad007\Fop\Arguments;

class ArgumentsTest extends TestCase
{
    /**
     * @var Arguments
     */
    protected $args = null;

    protected function setUp()
    {
        $this->args = new Arguments();
        $this->args['pdf'] = __DIR__ . '/../_files/test.pdf';
        $this->args['fo'] = __DIR__ . '/../_files/test.fo';
    }

    protected function tearDown()
    {
        unset($this->args);
    }

    /**
     * @test
     */
    public function readingArguments()
    {
        $this->assertStringEndsWith('/../_files/test.fo', $this->args['fo']);
        $this->assertStringEndsWith('/../_files/test.pdf', $this->args['pdf']);
    }
}
