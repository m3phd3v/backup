<?php
    namespace Lib\Abstraction;

    use \Lib\Classes as cls;

    abstract class Backup extends cls\Singleton {
        abstract public function checkBackupNeeded();

        abstract public function backUpNow();

        abstract public function removeOld();

        abstract public function cleanFolders();
    }
?>
