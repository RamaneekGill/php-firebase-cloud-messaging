<?php

namespace Sngrl\PhpFirebaseCloudMessaging\Tests;

use Mockery;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    protected function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }
}
