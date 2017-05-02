<?php

namespace Sngrl\PhpFirebaseCloudMessaging\Tests;

use Sngrl\PhpFirebaseCloudMessaging\Message;
use Sngrl\PhpFirebaseCloudMessaging\Notification;
use Sngrl\PhpFirebaseCloudMessaging\Recipient\Topic;
use Sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
use Sngrl\PhpFirebaseCloudMessaging\Recipient\Recipient;

class MessageTest extends TestCase
{
    private $fixture;

    protected function setUp()
    {
        parent::setUp();
        $this->fixture = new Message();
    }

    public function testThrowsExceptionWhenDifferentRecepientTypesAreRegistered()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->fixture->addRecipient(new Topic('breaking-news'))
            ->addRecipient(new class() extends Recipient
            {
            });
    }

    public function testThrowsExceptionWhenNoRecepientWasAdded()
    {
        $this->expectException(\UnexpectedValueException::class);
        $this->fixture->jsonSerialize();
    }

    public function testThrowsExceptionWhenMultipleTopicsWereGiven()
    {
        $this->expectException(\UnexpectedValueException::class);
        $this->fixture->addRecipient(new Topic('breaking-news'))
            ->addRecipient(new Topic('another topic'));

        $this->fixture->jsonSerialize();
    }

    public function testJsonEncodeWorksOnTopicRecipients()
    {
        $body = '{"to":"\/topics\/breaking-news","notification":{"title":"test","body":"a nice testing notification"}}';

        $notification = new Notification('test', 'a nice testing notification');
        $message = new Message();
        $message->setNotification($notification);

        $message->addRecipient(new Topic('breaking-news'));
        $this->assertSame(
            $body,
            json_encode($message)
        );
    }

    public function testJsonEncodeWorksOnDeviceRecipients()
    {
        $body = '{"to":"deviceId","notification":{"title":"test","body":"a nice testing notification"}}';

        $notification = new Notification('test', 'a nice testing notification');
        $message = new Message();
        $message->setNotification($notification);

        $message->addRecipient(new Device('deviceId'));
        $this->assertSame(
            $body,
            json_encode($message)
        );
    }
}
