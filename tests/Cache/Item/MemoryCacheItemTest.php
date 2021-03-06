<?php

namespace TechartAbac\Test\Cache\Item;

use TechartAbac\Cache\Item\MemoryCacheItem;

class MemoryCacheItemTest extends \PHPUnit\Framework\TestCase
{
    /** @var MemoryCacheItem **/
    protected $item;
    
    public function setUp()
    {
        $this->item = new MemoryCacheItem('php_abac.test');
    }
    
    public function testSet()
    {
        $this->item->set('test');
        
        $this->assertEquals('test', $this->item->get());
    }
    
    public function testIsHit()
    {
        $this->assertTrue($this->item->isHit());
    }
    
    public function testIsHitWithMissItem()
    {
        $this->item->expiresAt((new \DateTime())->setTimestamp(time() - 100));
        
        $this->assertFalse($this->item->isHit());
    }
    
    public function testGetKey()
    {
        $this->assertEquals('php_abac.test', $this->item->getKey());
    }
    
    public function testGet()
    {
        $this->item->set('test');
        
        $this->assertEquals('test', $this->item->get());
    }
    
    public function testExpiresAt()
    {
        $time = time();
        
        $this->item->expiresAt((new \DateTime())->setTimestamp($time));
        
        $this->assertEquals($time, $this->item->getExpirationDate()->getTimestamp());
    }
    
    public function testExpiresAfter()
    {
        $time = time() + 1500;
        
        $this->item->expiresAfter(1500);
        
        $this->assertEquals($time, $this->item->getExpirationDate()->getTimestamp());
    }
}
