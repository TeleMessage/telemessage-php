<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

/**
 * Class FileMessage
 * Contains data for sending file.
 * $value must be binary content of file decoded in base64
 */
class FileMessage extends CoreClass {

    protected $fileName;
    protected $mimeType;
    protected $preview = "";
    protected $type = 0;
    protected $value;

    function __construct() {
        parent::__construct("FileMessage");
    }

    /**
     * @return string
     */
    public function getFilename() { return $this->fileName; }

    /**
     * @param string $filename
     */
    public function setFilename($filename) { $this->fileName = $filename; }

    /**
     * @return string
     */
    public function getMimetype() { return $this->mimeType; }

    /**
     * @param string $mimetype
     */
    public function setMimetype($mimetype) { $this->mimeType = $mimetype; }

    /**
     * @return string
     */
    public function getValue() { return $this->value; }

    /**
     * Sets binary content of file decoded in base64
     * @param string $value
     */
    public function setValue($value) { $this->value = $value; }


    function toJson() {
        return "{\"class\" : \"" . $this->class . "\", \"value\" : \"" . addcslashes($this->value, TeleMessage::ESCAPE_JSON) . "\"" . ", \"fileName\" : \"" . addcslashes($this->fileName, TeleMessage::ESCAPE_JSON) . "\"" . ", \"preview\" : \"" . addcslashes($this->preview, TeleMessage::ESCAPE_JSON) . "\"" . ", \"type\" : " . $this->type . ", \"mimeType\" : \"" . addcslashes($this->mimeType, TeleMessage::ESCAPE_JSON) . "\"}";
    }

    function fromJson($data) {
        $this->fileName = $data["fileName"];
        $this->mimeType = $data["mimeType"];
        $this->preview = $data["preview"];
        $this->type = $data["type"];
        $this->value = $data["value"];
    }
}
?>