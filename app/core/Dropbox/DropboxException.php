<?php

class DropboxException extends Exception {

    public $message = '';
    public $code = '';
    public $previous = '';
    public $path = '';

    public function __construct($path, $message, $code = 0, Exception $previous = null) {
        $this->path = $path;
        $this->message = $message;
        $this->code = $code;
        $this->previous = $previous;
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . $this->path .": [{$this->code}]: {$this->message}";
    }

}

class DropboxAuthException extends DropboxException {
    public function __toString() {
        return __CLASS__ . $this->path .": [{$this->code}]: {$this->message}";
    }
}

class DropboxListAllFilesException extends DropboxException {
    public function __toString() {
        return __CLASS__ . ' ' .$this->path .": [{$this->code}]: {$this->message}";
    }
}

class DropboxInvalidTokenException extends DropboxException {
    public function __toString() {
        return __CLASS__ . ' ' .$this->path .": [{$this->code}]: {$this->message}";
    }
}

class DropboxGetFileMetadataException extends DropboxException {
    public function __toString() {
        return __CLASS__ . ' ' .$this->path .": [{$this->code}]: {$this->message}";
    }
}

class DropboxDownloadFileByIdException extends DropboxException {
    public function __toString() {
        return __CLASS__ . ' ' .$this->path .": [{$this->code}]: {$this->message}";
    }
}

class DropboxUploadFileException extends DropboxException {
    public function __toString() {
        return __CLASS__ . ' ' .$this->path .": [{$this->code}]: {$this->message}";
    }
}

class DropboxStorageQuotaException extends DropboxException {
    public function __toString() {
        return __CLASS__ . ' ' .$this->path .": [{$this->code}]: {$this->message}";
    }
}

class DropboxNotEnoughStorageSpaceException extends DropboxException {
    public function __toString() {
        return __CLASS__ . ' ' .$this->path .": [{$this->code}]: {$this->message}";
    }
}

class DropboxDeleteException extends DropboxException {
    public function __toString() {
        return __CLASS__ . ' ' .$this->path .": [{$this->code}]: {$this->message}";
    }
}

?>