<?php

namespace Sngrl\PhpFirebaseCloudMessaging\Recipient;

class Device extends Recipient
{
    /**
     * The devices token on Firebase.
     *
     * @var string
     */
    private $token;

    /**
     * Constructs the device with a token from fcm.
     *
     * @param string $token
     *        The token.
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Returns the token for the device.
     *
     * @return string
     *         The fcm device token.
     */
    public function getToken(): string
    {
        return $this->token;
    }
}
