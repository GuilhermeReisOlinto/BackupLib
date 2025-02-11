<?php

require __DIR__ . '/../vendor/autoload.php';

use FileBackupLib\FileBackupLib;

$backup = new FileBackupLib();

try {
    $path = "/home/guilherme.olinto/Documentos/projetos/libs/BackupLibs/test.sh";
    $pathDestination = "/home/guilherme.olinto/Documentos/projetos/libs/FileBackupLib/test_backup.tar.gz";
    // echo $backup->compress($path, "test_backup.tar.gz");
    echo $backup->sync($path, $pathDestination);
    // echo $backup->cleanOldFile($pathDestination, 30);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
