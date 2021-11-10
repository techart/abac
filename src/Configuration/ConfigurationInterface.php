<?php

namespace TechartAbac\Configuration;

interface ConfigurationInterface
{
    public function getAttributes(): array;
    
    public function getRules(): array;
}