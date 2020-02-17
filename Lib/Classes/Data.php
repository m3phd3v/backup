<?php
    namespace Lib\Classes;

    use \Lib\Abstraction as act;

    /**
     * class Data
     *
     * Maintains the cache data of the backup app
     *
     * @package Lib\Classes
     * @author Wilwert Claude
     */
    class Data extends act\Data {
        /**
         * Saves a cache file of a specific source path
         *
         * @access public
         * @param  string $id   Backup id
         * @param  string $path Source path
         * @return null
         */
        public static function persist(string $id, string $path) {
            file_put_contents(ROOT . 'Data/' . $id, filemtime($path));
        }

        /**
         * Removes a cache file of a specific source path
         *
         * @access public
         * @param  string $id Backup id
         * @return null
         */
        public static function remove(string $id) {
            $file = ROOT . 'Data/' . $id;

            if (file_exists($file)) {
                unlink($file);
            }
        }

        /**
         * Checks if the source path has been modified
         * since the last backup based on the data cache
         *
         * @access public
         * @param  string $id   Backup id
         * @param  string $path Source path
         * @return null
         */
        public static function check(string $id, string $path) {
            $file = ROOT . 'Data/' . $id;
            $do = false;

            if (file_exists($file)) {
                $old = (double)file_get_contents($file);
                $do = filemtime($path) <= $old;
            }

            return $do;
        }
    }
?>
