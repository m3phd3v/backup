<?php
    namespace Lib\Classes;

    use \Lib\Abstraction as act;

    /**
     * class Folder
     *
     * Scans Backup folders
     *
     * @package Lib\Classes
     * @author Wilwert Claude
     */
    class Folder extends act\Folder{
        /**
         * @var array $skip Folders to skip
         */
        protected static $skip = array(
            '.',
            '..',
            '$RECYCLE.BIN',
            'System Volume Information',
        );

        /**
         * Recursively scams a folder which will be backuped
         *
         * @access public
         * @param  string $path Source path
         * @return array
         */
        public static function scan(string $path) {
            $files = scandir($path);
            $final = array();

            foreach(self::$skip as $filename) {
                if (($key = array_search($filename, $files)) !== false) {
                    unset($files[$key]);
                }
            }

            foreach($files as $file) {
                $final[$file] = null;

                if (is_dir($path . $file)) {
                    $final[$file] = self::scan($path . $file . '/');
                }
            }

            return $final;
        }
    }
?>
