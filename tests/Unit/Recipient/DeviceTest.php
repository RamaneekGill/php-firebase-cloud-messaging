<?php

namespace Tests\Unit\Recipient;

use Mockery;
use Tests\TestCase;
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
