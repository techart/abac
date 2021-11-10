<?php

namespace TechartAbac\Test\Comparison;

use TechartAbac\Comparison\StringComparison;

use TechartAbac\Manager\ComparisonManager;

class StringComparisonTest extends \PHPUnit\Framework\TestCase
{
    /** @var StringComparison **/
    protected $comparison;

    public function setUp()
    {
        $this->comparison = new StringComparison($this->getComparisonManagerMock());
    }

    public function testIsEqual()
    {
        $this->assertTrue($this->comparison->isEqual('john-doe', 'john-doe'));
        $this->assertFalse($this->comparison->isEqual('john-doe', 'john-DOE'));
    }

    public function testIsNotEqual()
    {
        $this->assertTrue($this->comparison->isNotEqual('john-doe', 'john-DOE'));
        $this->assertFalse($this->comparison->isNotEqual('john-doe', 'john-doe'));
    }
    
    public function getComparisonManagerMock()
    {
        $comparisonManagerMock = $this
            ->getMockBuilder(ComparisonManager::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
        return $comparisonManagerMock;
    }
}
