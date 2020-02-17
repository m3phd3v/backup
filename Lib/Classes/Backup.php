<?php
    namespace Lib\Classes;

    use \Lib\Abstraction as act;

    /**
     * class Backup
     *
     * Generates the backup files
     *
     * @package Lib\Classes
     * @author Wilwert Claude
     */
    class Backup extends act\Backup {
        /**
         * Checks every configured directory whether it should
         * be backuped now or not
         *
         * @access public
         * @return null
         */
        public function checkBackupNeeded() {
            $config = Config::getConfig();

            foreach($config as $id => $cfg) {
                $dir = Config::getDestination() . $cfg['id'];
                $do = false;

                if (file_exists($dir) && is_dir($dir)) {
                    $do = time() - filemtime($dir)
                        > (eval('return ' . $cfg['int'] . ';') * 60 * 60)
                        && Data::check($cfg['id'], $cfg['path']);
                } else {
                    mkdir($dir);

                    $do = true;
                }

                if ($do) {
                    $config[$id]['need'] = true;
                    $config[$id]['time'] = filemtime($dir);
                    $config[$id]['dir'] = $dir . '/';
                }
            }

            Config::setConfig($config);
        }

        /**
         * Generates the backup files
         *
         * @access public
         * @return null
         */
        public function backUpNow() {
            foreach(Config::getConfig() as $cfg) {
                if ($cfg['need']) {
                    $output = $cfg['dir']
                            . sha1($cfg['id'] . time())
                            . '.tar';

                    Tarball::compress($cfg['path'], $output);
                    Data::persist($cfg['id'], $cfg['path']);
                }
            }
        }

        /**
         * Removes old backup files which are not longer
         * allowed by the config parameters
         *
         * @access public
         * @return null
         */
        public function removeOld() {
            foreach(Config::getConfig() as $cfg) {
                if ($cfg['need']) {
                    $raw = Folder::scan($cfg['dir']);
                    $files = array();

                    foreach($raw as $file => $ignore) {
                        $files[filemtime($cfg['dir'] . $file)] = $file;
                    }

                    ksort($files);

                    while(count($files) > $cfg['keep']) {
                        unlink($cfg['dir'] . array_shift($files));
                    }
                }
            }
        }

        /**
         * Removed backup folders of old backup files which
         * are not longer configured
         *
         * @access public
         * @return null
         */
        public function cleanFolders() {
            $dest = Config::getDestination();
            $current = array();
            $remove = Folder::scan($dest);

            foreach(Config::getConfig() as $cfg) {
                if (isset($remove[$cfg['id']])) {
                    unset($remove[$cfg['id']]);
                }
            }
            
            foreach($remove as $folder => $ignore) {
                $files = Folder::scan($dest);

                foreach($files as $file => $ignore) {
                    unlink($dest . $folder . '/' . $file);
                }

                rmdir($dest . $folder);

                Data::remove($folder);
            }
        }
    }
?>
