<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

class IPDeviceAuthenticationDetails extends AuthenticationDetails {
    protected $identifier;
    protected $appIdentifier;

    function __construct() {
        parent::__construct("IPDeviceAuthenticationDetails");
    }

    /**
     * @return string
     */
    public function getAppIdentifier() { return $this->appIdentifier; }

    /**
     * @param string $appidentifier
     */
    public function setAppIdentifier($appidentifier) { $this->appIdentifier = $appidentifier; }

    /**
     * @return string
     */
    public function getIdentifier() { return $this->identifier; }

    /**
     * @param string $identifier
     */
    public function setIdentifier($identifier) { $this->identifier = $identifier; }


    function toJson() {
        return "{\"class\" : \"" . $this->class . "\", \"username\" : \"" . addcslashes($this->username, TeleMessage::ESCAPE_JSON) . "\"" . ", \"password\" : \"" . addcslashes($this->password, TeleMessage::ESCAPE_JSON) . "\"" . ", \"identifier\" : \"" . addcslashes($this->identifier, TeleMessage::ESCAPE_JSON) . "\"" . ", \"appIdentifier\" : \"" . addcslashes($this->appIdentifier, TeleMessage::ESCAPE_JSON) . "\"}";
    }

    function fromJson($data) {
        parent::fromJson($data);
        $this->identifier = $data["identifier"];
        $this->appIdentifier = $data["appIdentifier"];
    }
}
?>