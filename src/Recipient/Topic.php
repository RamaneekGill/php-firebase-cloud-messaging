<?php

namespace Sngrl\PhpFirebaseCloudMessaging\Recipient;

class Topic extends Recipient
{
    /**
     * The name of the topic to receive our message.
     *
     * @var string
     */
    private $name;

    /**
     * Constructs the topic with the fcm registered name.
     *
     * @param string $name
     *        The name of the topic.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the registered name of the topic.
     *
     * @return string
     *         The name of the topic.
     */
    public function getName(): string
    {
        return $this->name;
    }
}
