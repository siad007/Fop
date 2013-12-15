<?php

namespace siad007\Fop\Tests;

use \PHPUnit_Framework_TestCase as TestCase;
use siad007\Fop\Options;

class ArgumentsTest extends TestCase
{
    /**
     * @var Options
     */
    protected $opts = null;

    protected function setUp()
    {
        $this->opts = new Options();
    }

    protected function tearDown()
    {
        unset($this->opts);
    }

    /**
     * @test
     */
    public function settingOptions()
    {
        $this->assertFalse($this->opts->isVerbose());
        $this->assertFalse($this->opts->isQuiet());
        $this->assertTrue($this->opts->setQuiet(true)->isQuiet());
        $this->assertTrue($this->opts->setVerbose(true)->isVerbose());
    }
}
