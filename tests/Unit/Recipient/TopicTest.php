<?php

namespace Tests\Unit\Recipient;

use Mockery;
use Tests\TestCase;
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
