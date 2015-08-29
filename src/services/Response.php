<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */
class Response extends CoreClass {

    protected $resultCode;
    protected $resultDescription;
    protected $contentSize;

    /**
     * @return int
     */
    public function getContentSize() { return $this->contentSize; }

    /**
     * @param int $contentSize
     */
    public function setContentSize($contentSize) { $this->contentSize = $contentSize; }

    /**
     * @return integer
     */
    public function getResultCode() { return $this->resultCode; }

    /**
     * @param integer resultCode
     */
    public function setResultCode($resultCode) { $this->resultCode = $resultCode; }

    /**
     * @return string
     */
    public function getResultDescription() { return $this->resultDescription; }

    /**
     * @param string $resultDescription
     */
    public function setResultDescription($resultDescription) { $this->resultDescription = $resultDescription; }

}