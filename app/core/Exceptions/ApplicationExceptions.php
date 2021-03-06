<?php
    class ApplicationExceptions extends Exception
    {
    public function __construct($message=null, $code = 0, Exception $previous = null) {
        $this->$message=$message;
        $this->$code=$code;
        $this->$previous=$previous;
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}

class UsernameTakenException extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

class IncorrectPasswordException extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class InvalidItemId extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class InvalidItemParentId extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class ItemNameTaken extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class MoveInvalidNameAndType extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class InvalidUploadId extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class UnsupportedChunkSize extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class DeleteSplittingFile extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class NotEnoughStorage extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class NoStorageServices extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class InvalidDownloadId extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class MissingOneDriveAuthException extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class MissingDropboxAuthException extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class MissingGoogledriveAuthException extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class InvalidRedundancyException extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class RedundantFileDeletedFromAllServicesException extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class RedundantFileDownloadMissingAllAuthException extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
class RedundantFileDownloadMissingServicesAuthException extends ApplicationExceptions
{
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}



?>