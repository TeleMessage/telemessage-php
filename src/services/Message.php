<?php
namespace telemessage\web\services;

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

}