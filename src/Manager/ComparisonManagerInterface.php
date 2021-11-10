<?php

namespace TechartAbac\Manager;

use TechartAbac\Model\PolicyRuleAttribute;

interface ComparisonManagerInterface
{
    public function compare(PolicyRuleAttribute $pra, bool $subComparing = false): bool;
    
    public function addComparison(string $type, string $class);
    
    public function getResult(): array;
}