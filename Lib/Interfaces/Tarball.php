<?php
    namespace Lib\Interfaces;

    interface Tarball {
        public static function compress(
            string $input,
            string $output
        );
    }
?>
