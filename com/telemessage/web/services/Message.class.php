<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

class Message extends CoreClass {

    protected $subject;
    protected $textMessage;
    protected $schedule;
    protected $properties = array();
    protected $fileMessages = array();
    protected $recipients = array();

    function __construct() {
        parent::__construct("Message");
    }

    function toJson() {
        $str = "{\"class\" : \"" . $this->class . "\", ";
        $str .= "\"subject\" : \"" . addcslashes($this->subject, TeleMessage::ESCAPE_JSON) . "\",";
        $str .= "\"textMessage\" : \"" . addcslashes($this->textMessage, TeleMessage::ESCAPE_JSON) . "\",";
        if ($this->schedule)
            $str .= "\"schedule\" : " . $this->schedule->toJson() . ",";

        $Length = count($this->properties);
        $str .= "\"properties\" : [";
        if ($Length > 0) {
            for ($i=0; $i < $Length; $i++) {
                if ($i > 0) {
                    $str .= ",";
                }
                $str .= $this->properties[$i]->toJson();

            }
        }
        $str .= "],";

        $Length = count($this->fileMessages);
        $str .= "\"fileMessages\" : [";
        if ($Length > 0) {
            for ($i=0; $i < $Length; $i++) {
                if ($i > 0) {
                    $str .= ",";
                }
                $str .= $this->fileMessages[$i]->toJson();

            }
        }
        $str .= "],";


        $Length = count($this->recipients);
        $str .= "\"recipients\" : [";
        if ($Length > 0) {
            for ($i=0; $i < $Length; $i++) {
                if ($i > 0) {
                    $str .= ",";
                }
                $str .= $this->recipients[$i]->toJson();

            }
        }
        $str .= "]";

        $str .= "}";

        return $str;
    }

    /**
     * @return array of FileMessage
     */
    public function getFilemessages() { return $this->fileMessages; }

    /**
     * @param array $filemessages array of FileMessage
     */
    public function setFilemessages($filemessages) { $this->fileMessages = $filemessages; }

    /**
     * @param FileMessage $filemessage
     */
    public function addFilemessage(FileMessage $filemessage) { array_push($this->fileMessages, $filemessage); }

    /**
     * @return array of Property
     */
    public function getProperties() { return $this->properties; }

    /**
     * @param array $properties array of Property
     */
    public function setProperties($properties) { $this->properties = $properties; }

    /**
     * @param Property $property
     */
    public function addProperty(Property $property) { array_push($this->properties, $property); }

    /**
     * @return array of Recipient
     */
    public function getRecipients() { return $this->recipients; }

    /**
     * @param array $recipients array of Recipient
     */
    public function setRecipients($recipients) { $this->recipients = $recipients; }

    /**
     * @param Recipient $recipient
     */
    public function addRecipient(Recipient $recipient) { array_push($this->recipients, $recipient); }

    /**
     * @return Schedule
     */
    public function getSchedule() { return $this->schedule; }

    /**
     * @param Schedule $schedule
     */
    public function setSchedule(Schedule $schedule) { $this->schedule = $schedule; }

    /**
     * @return string
     */
    public function getSubject() { return $this->subject; }

    /**
     * @param string $subject
     */
    public function setSubject($subject) { $this->subject = $subject; }

    /**
     * @return string
     */
    public function getTextmessage() { return $this->textMessage; }

    /**
     * @param string $textmessage
     */
    public function setTextmessage($textmessage) { $this->textMessage = $textmessage; }

    function fromJson($data) {
        $this->subject = $data["subject"];
        $this->textMessage = $data["textMessage"];
        if (isset($data["schedule"]))
            $this->schedule = $data["schedule"];
        $this->properties = array();
        if (isset($data["properties"]) && is_array($data["properties"])) {
            while (list($key, $value) = each($data["properties"])) {
                $prop = new Property();
                $prop->fromJson($value);
                array_push($this->properties, $prop);
            }
        }
        $this->filemessages = array();
        if (isset($data["fileMessages"]) && is_array($data["fileMessages"])) {
            while (list($key, $value) = each($data["fileMessages"])) {
                $file = new FileMessage();
                $file->fromJson($value);
                array_push($this->filemessages, $file);
            }
        }
        $this->recipients = array();
        if (isset($data["recipients"]) && is_array($data["recipients"])) {
            while (list($key, $value) = each($data["recipients"])) {
                $resp = new Recipient();
                $resp->fromJson($value);
                array_push($this->recipients, $resp);
            }
        }
    }
}