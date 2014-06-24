<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

/**
 * Class AuthenticationDetails
 * Class contains authentication data for negotiation with TeleMessage
 */
class AuthenticationDetails extends CoreClass {
    protected $username;
    protected $password;

    function __construct() {
        parent::__construct("AuthenticationDetails");
    }

    /**
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

    function toJson() {
        return "{\"class\" : \"" . $this->class . "\", \"username\" : \"" . addcslashes($this->username, TeleMessage::ESCAPE_JSON) . "\"" . ", \"password\" : \"" . addcslashes($this->password, TeleMessage::ESCAPE_JSON) . "\"}";
    }


    function fromJson($data) {
        $this->username = $data["username"];
        $this->password = $data["password"];
    }
}
?>