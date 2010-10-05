<?php

require_once('dd_logging_AbstractLogger.php');

class dd_logging_SimpleLogger extends dd_logging_AbstractLogger {
    
    /**
     * Constructor
     * @param $className
     */
    public function __construct($className = null) {
        parent::__construct($className);
    }
    
    /**
     * (non-PHPdoc)
     * @see dd_logging_ILogger::trace()
     */
    public function trace($message) {
        $this->logMessage('trace', $message);
    }

    /**
     * (non-PHPdoc)
     * @see dd_logging_ILogger::debug()
     */
    public function debug($message) {
        $this->logMessage('debug', $message);
    }
    
    /**
     * (non-PHPdoc)
     * @see dd_logging_ILogger::info()
     */
    public function info($message) {
        $this->logMessage('info', $message);
    }
    
    /**
     * (non-PHPdoc)
     * @see dd_logging_ILogger::warn()
     */    
    public function warn($message) {
        $this->logMessage('warn', $message);
    }

    /**
     * (non-PHPdoc)
     * @see dd_logging_ILogger::error()
     */
    public function error($message) {
        $this->logMessage('error', $message);
    }
    
    /**
     * (non-PHPdoc)
     * @see dd_logging_ILogger::fatal()
     */
    public function fatal($message) {
        $this->logMessage('fatal', $message);
    }
    
    /**
     * (non-PHPdoc)
     * @see dd_logging_ILogger::isDebugEnabled()
     */
    public function isDebugEnabled() {
    }
    
    /**
     * Log a message
     * @param $level
     * @param $message
     */
    protected function logMessage($level, $message) {
        error_log($this->modifiedClassName . ' - ' . $level . ': ' . $message);
    }
    
}

?>