<?php

use zhilevan\GoogShortly;
use zhilevan\GoogShortlyException;

class GooglShortlyTest extends PHPUnit_Framework_TestCase
{
    private $googShort = null;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        $apiKey = getenv('GOOGLE_API');
        $this->assertNotEmpty($apiKey, 'The Google URL Shortener API key must not be empty.');

        $this->googl = new GoogShortly($apiKey);
    }

    public function testGooglShorten()
    {
        $actual = $this->googShort->shorten('http://zhilevan.com/');

        $this->assertRegExp("#^http://goo.gl/(\w+)$#", $actual);
    }

    public function testGooglExpand()
    {
        $expected = 'http://github.com/';
        $actual = $this->googShort->expand('http://goo.gl/KkZ8');

        $this->assertEquals($expected, $actual);
    }

    /**
     * @expectedException zhilevan\GooglShortlyException
     */
    public function testGooglShortlyException()
    {
        $this->googShort->expand('foobar');
    }
}
