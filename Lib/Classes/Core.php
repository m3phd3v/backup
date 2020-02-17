<?php
    namespace Lib\Classes;

    use \Lib\Abstraction as act;

    /**
     * class Core
     *
     * Main core class which directs the workflow of the script
     *
     * @package Lib\Classes
     * @author Wilwert Claude
     */
    class Core extends act\Core {
        /**
         * @access protected
         * @return null
         */
        protected function init() {
            Config::getInstance();
        }

        /**
         * Resolves the command line arguments to direct the
         * script to a specific task
         *
         * @access public
         * @param  array $args Command line arguments
         * @return null
         */
        public function run(array $args) {
            if (empty($args)) {
                $this->generateBackup();
            } else {

            }
        }

        /**
         * Generates a backup based upon the config file
         *
         * @access protected
         * @return null
         */
        protected function generateBackup() {
            $backup = Backup::getInstance();

            $backup->checkBackupNeeded();
            $backup->backUpNow();
            $backup->removeOld();
            $backup->cleanFolders();
        }

        protected function showVersions(string $id=null) {
        }

        protected function rollback(string $id, string $version) {
        }
    }
?>
