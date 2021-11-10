<?php

namespace TechartAbac\Manager;

use TechartAbac\Model\AbstractAttribute;

interface AttributeManagerInterface
{
    public function getAttribute(string $attributeId): AbstractAttribute;

    public function retrieveAttribute(AbstractAttribute $attribute, $user = null, $object = null, array $getter_params = []);
}
