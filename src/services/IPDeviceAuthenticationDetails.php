<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */
class IPDeviceAuthenticationDetails extends AuthenticationDetails {
    protected $identifier;
    protected $appIdentifier;

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

}