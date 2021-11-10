<?php

namespace TechartAbac\Test\Model;

use TechartAbac\Model\{
    Attribute,
    PolicyRuleAttribute
};

class PolicyRuleAttributeTest extends \PHPUnit\Framework\TestCase
{
    public function testEntity()
    {
        $policyRuleAttribute =
            (new PolicyRuleAttribute())
            ->setAttribute(new Attribute())
            ->setComparisonType('String')
            ->setComparison('isEqual')
            ->setValue(true)
        ;
        $this->assertTrue($policyRuleAttribute->getValue());
        $this->assertInstanceof('TechartAbac\Model\Attribute', $policyRuleAttribute->getAttribute());
        $this->assertEquals('String', $policyRuleAttribute->getComparisonType());
        $this->assertEquals('isEqual', $policyRuleAttribute->getComparison());
    }
}
