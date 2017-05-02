<?php

namespace Sngrl\PhpFirebaseCloudMessaging\Tests;

use Mockery;
use GuzzleHttp;
use GuzzleHttp\Psr7\Response;
use Sngrl\PhpFirebaseCloudMessaging\Client;
use Sngrl\PhpFirebaseCloudMessaging\Message;
use Sngrl\PhpFirebaseCloudMessaging\Recipient\Topic;

class ClientTest extends TestCase
{
    private $fixture;

    protected function setUp()
    {
        parent::setUp();
        $this->fixture = new Client();
    }

    public function testSendConstruesValidJsonForNotificationWithTopic()
    {
        $response = Mockery::mock(Response::class);

        $apiKey = 'key';
        $headers = array(
            'Authorization' => sprintf('key=%s', $apiKey),
            'Content-Type' => 'application/json'
        );

        $guzzle = Mockery::mock(\GuzzleHttp\Client::class);
        $guzzle->shouldReceive('post')
            ->once()
            ->with(
                Client::DEFAULT_API_URL,
                ['headers' => $headers, 'body' => '{"to":"\\/topics\\/test"}']
            )
            ->andReturn($response);

        $this->fixture->injectGuzzleHttpClient($guzzle);
        $this->fixture->setApiKey($apiKey);

        $message = new Message();
        $message->addRecipient(new Topic('test'));

        $result = $this->fixture->send($message);

        $this->assertSame($response, $result);
    }
}
