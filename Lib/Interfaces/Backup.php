<?php
    namespace Lib\Interfaces;

    interface Backup {
        public function checkBackupNeeded();

        public function backUpNow();

        public function removeOld();

        public function cleanFolders();
    }
?>
