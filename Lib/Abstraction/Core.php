<?php
    namespace Lib\Abstraction;

    use \Lib\Classes as cls;
    use \Lib\Interfaces as ifc;

    abstract class Core extends cls\Singleton implements ifc\Core {
        abstract public function run(
            array $args
        );

        abstract protected function generateBackup();

        abstract protected function showVersions(
            string $id=null
        );

        abstract protected function rollback(
            string $id,
            string $version
        );
    }
?>
