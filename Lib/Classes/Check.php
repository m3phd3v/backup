<?php
    namespace Lib\Classes;

    use \Lib\Abstraction as act;

    final class Check extends act\Check {
        public static function fileExists(string $path) {
            return file_exists($path) && is_file($path)
                ? true
                : self::error('file', $path);
        }

        public static function sourceExists(string $path) {
            return file_exists($path) && is_dir($path)
                ? true
                : self::error('source', $path);
        }

        public static function dirExists(string $path) {
            return file_exists($path) && is_dir($path)
                ? true
                : self::error('dir', $path);
        }

        protected function error(string $type, string $content=null) {
            $msg = 'The ';

            switch($type) {
                case 'file':
                    $msg .= 'file ';
                break;
                case 'source':
                    $msg .= 'source ';
                break;
                case 'dir':
                    $msg .= 'directory ';
                break;
            }

            echo $msg . $content . ' doesn\'t exist', "\n";exit;
        }
    }
?>
