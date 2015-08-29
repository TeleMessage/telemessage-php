<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
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

    /**
     * Gets file name
     * @return string
     */
    public function getFilename() { return $this->fileName; }

    /**
     * Sets file name
     * @param string $filename
     */
    public function setFilename($filename) { $this->fileName = $filename; }

    /**
     * Gets files's mime type
     * @return string
     */
    public function getMimetype() { return $this->mimeType; }

    /**
     * Sets file's mime type
     * @param string $mimetype
     */
    public function setMimetype($mimetype) { $this->mimeType = $mimetype; }

    /**
     * returns file's content as it has been set (should be base64 decoded)
     * @return string
     */
    public function getValue() { return $this->value; }

    /**
     * Sets binary content of file decoded in base64
     * @param string $value
     */
    public function setValue($value) { $this->value = $value; }
}