<?php

namespace App\Model;

use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @author    Nikodem Osmialowski
 * @copyright Fitatu Sp. z o.o.
 */
class UserModel implements UserInterface, JWTUserInterface
{
    /** @var string */
    private $username;

    /** @var string[] */
    private $roles;

    /**
     * @param string   $username
     * @param string[] $roles
     */
    public function __construct(string $username, array $roles)
    {
        $this->username = $username;
        $this->roles = $roles;
    }

    /**
     * @param string $username
     * @param array  $payload
     *
     * @return UserModel
     */
    public static function createFromPayload($username, array $payload)
    {
        return new static($username, $payload['roles']);
    }

    /**
     * @return string[]
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return '';
    }

    /**
     * @return null
     */
    public function getSalt()
    {
        return;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
        return;
    }
}
