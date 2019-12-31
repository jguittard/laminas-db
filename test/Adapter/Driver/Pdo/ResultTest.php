<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\Db\Adapter\Driver\Pdo;

use Laminas\Db\Adapter\Driver\Pdo\Result;

class ResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests current method returns same data on consecutive calls.
     *
     * @covers Laminas\Db\Adapter\Driver\Pdo\Result::current
     */
    public function testCurrent()
    {
        $stub = $this->getMock('PDOStatement');
        $stub
            ->expects($this->any())
            ->method('fetch')
            ->will($this->returnCallback(function () {return uniqid();}));

        $result = new Result();
        $result->initialize($stub, null);

        $this->assertEquals($result->current(), $result->current());
    }
}
