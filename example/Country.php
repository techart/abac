<?php

namespace TechartAbac\Example;

class Country
{
    /** @var string **/
    protected $name;
    /** @var string **/
    protected $code;
    
    /**
     * @param string $name
     * @return \TechartAbac\Example\Country
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $code
     * @return \TechartAbac\Example\Country
     */
    public function setCode($code)
    {
        $this->code = $code;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
