<?php
    $url = 'https://getcomposer.org/installer';
    $sig = 'A4BAA88C2BDBA2EAE0D31FA2DC0D644448E109AA';
    $sigfile = 'composer-setup.sig';
    $composerfile = 'composer-setup.php';

    if (file_exists($sigfile)) {
        $signature = trim(file_get_contents($sigfile));
    } else {
        $signature = '';
    }

    if (hash('SHA384', file_get_contents($composerfile)) === $sig) {
        echo 'Installer verified';
    } else {
        echo 'Installer corrupt';
        unlink($composerfile);
        exit(1);
    }

    $command = "php $composerfile";
    exec($command);
- name: Add executable permissions to composer-setup.php
  run: chmod +x composer-setup.php

