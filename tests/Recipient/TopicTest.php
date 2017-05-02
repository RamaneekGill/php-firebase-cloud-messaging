<?php

namespace Sngrl\PhpFirebaseCloudMessaging\Tests;

use Mockery;
use Sngrl\PhpFirebaseCloudMessaging\Tests\TestCase;
use Sngrl\PhpFirebaseCloudMessaging\Recipient\Topic;

class TopicTest extends TestCase
{
    public function testGetNameReturnsTheName()
    {
        $expected = 'name';

        $device = new Topic($expected);

        $this->assertSame($expected, $device->getName());
    }
}
