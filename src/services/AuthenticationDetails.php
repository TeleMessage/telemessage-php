<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.

 * Class AuthenticationDetails
 * Class contains authentication data for negotiation with TeleMessage
 */
class AuthenticationDetails extends CoreClass {
    /**
     * @var string username
     */
    protected $username;
    /**
     * @var string password
     */
    protected $password;

    /**
     * Gets user's password
     * @return string
     */
    public function getPassword() { return $this->password; }

    /**
     * Sets user's password
     * @param string $password
     */
    public function setPassword($password) { $this->password = $password; }

    /**
     * Returns user's username
     * @return string
     */
    public function getUsername() { return $this->username; }

    /**
     * Sets user's username
     * @param string $username
     */
    public function setUsername($username) { $this->username = $username; }

}