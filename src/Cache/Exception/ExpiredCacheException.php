<?php

namespace TechartAbac\Cache\Exception;

use \Psr\Cache\CacheException;

class ExpiredCacheException extends \Exception implements CacheException
{
}
