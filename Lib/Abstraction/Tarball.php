<?php
    namespace Lib\Abstraction;

    use \Lib\Classes as cls;
    use \Lib\Interfaces as ifc;

    abstract class Tarball extends cls\Singleton implements ifc\Tarball {
        abstract public static function compress(
            string $input,
            string $output
        );
    }
?>
