<?php

namespace Sngrl\PhpFirebaseCloudMessaging\Tests;

use Mockery;
use Sngrl\PhpFirebaseCloudMessaging\Tests\TestCase;
use Sngrl\PhpFirebaseCloudMessaging\Recipient\Device;

class DeviceTest extends TestCase
{
    public function testGetTokenReturnsTheToken()
    {
        $expected = 'token';

        $device = new Device($expected);

        $this->assertSame($expected, $device->getToken());
    }
}
