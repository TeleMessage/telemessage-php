<?php
namespace telemessage\web\services\dialoggroup\info;

use telemessage\web\services\FileMessage;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class SetImageInfo extends GroupOperationInfo {
    protected $image;

    /**
     * @return FileMessage
     */
    public function getImage() { return $this->image; }

    /**
     * @param FileMessage $image
     */
    public function setImage(FileMessage $image) { $this->image = $image; }


}