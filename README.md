# Backup

Lightweight disc backup app written in php

## Dependencies

* php5.3+
* php-cli
* php-yaml

## Installation

Install the dependencies then clone the repository.

    cp <__DIR__>/Config/path.yml.sample <__DIR__>/Config/path.yml
    cp <__DIR__>/Config/source.yml.sample <__DIR__>/Config/path.yml

Edit file `<__DIR__>/Config/path.yml`
Modify the `config` to the path where you store your `config.yml` file.

Edit file `<__DIR__>/Config/source.yml` in the default path or where you store it.

* id -> Textual id which must be unique.
* title -> Human readable title text for the backup.
* keep -> Number of backup versions to keep in the storage.
* interval -> Interval time when backups will be created in hours.

## Cron

Edit the file `/etc/crontab` with root access and add the following line to run the script every hour

    0  *    * * *   <user> php <__DIR__>/run.php
