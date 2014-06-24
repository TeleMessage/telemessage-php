<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

class Response extends CoreClass {

    protected $resultCode;
    protected $resultDescription;

    function __construct() {
        parent::__construct("Response");
    }

    /**
     * @return integer
     */
    public function getResultCode() { return $this->resultCode; }

    /**
     * @param integer $resultcode
     */
    public function setResultCode($resultcode) { $this->resultCode = $resultcode; }

    /**
     * @return string
     */
    public function getResultDescription() { return $this->resultDescription; }

    /**
     * @param string $resultdescription
     */
    public function setResultDescription($resultdescription) { $this->resultDescription = $resultdescription; }


    function toJson() {
        return "{\"class\" : \"" . $this->class . "\", \"resultCode\": " . $this->resultCode . ", \"resultDescription\" : \"" . addcslashes($this->resultDescription, TeleMessage::ESCAPE_JSON) . "\"}";
    }

    function fromJson($data) {
        $this->resultCode = $data["resultCode"];
        $this->resultDescription = $data["resultDescription"];
    }
}
?>