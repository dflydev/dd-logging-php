<?php

require_once('dd_logging_SimpleLogger.php');

class dd_logging_SimpleFileLogger extends dd_logging_SimpleLogger {
    static protected $FILE_NAME;
    static protected $FILE_HANDLE;
    static protected $FILE_HANDLE_COUNT = 0;
    protected $fh;
    protected $destroyed = false;
    static public function CONFIGURE_LOGGER($configuration) {
        if ( isset($configuration['fileName']) ) self::$FILE_NAME = $configuration['fileName'];
    }
    protected function writeLogMessage($message) {
        $fh = $this->getFileHandle();
        fwrite($fh, '[' . date('r') . '] ' . $message . "\n");
    }
    protected function getFileHandle() {
        if ( $this->fh === null ) {
            if ( self::$FILE_HANDLE === null ) {
                self::$FILE_HANDLE = fopen(self::$FILE_NAME, 'a');
            }
            $this->fh = self::$FILE_HANDLE;
            self::$FILE_HANDLE_COUNT++;
        }
        return self::$FILE_HANDLE;
    }
    public function __destruct() {
        if ( $this->fh !== null ) {
            if ( --self::$FILE_HANDLE_COUNT == 0 ) {
                if ( self::$FILE_HANDLE === null ) {
                    fclose(self::$FILE_HANDLE);
                }
                self::$FILE_HANDLE = $this->fh = null;
            }
        }
    }
}

?>
