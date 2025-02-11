<?php

use FileBackupLib\FileBackupLib;
use PHPUnit\Framework\TestCase;

class FileBackupLibTest extends TestCase
{
    private $fileBackup;

    protected function setUp(): void
    {
        $this->fileBackup = new FileBackupLib();
    }

    public function testCompressThrowsExceptionIfSourceDoesNotExist()
    {
        $this->expectException(Exception::class);
        $this->fileBackup->compress("/path/non-existent", "backup.tar.gz");
    }

    public function testCleanOldFilesThrowsExceptionIfPathDoesNotExists()
    {
        $this->expectException(Exception::class);
        $this->fileBackup->cleanOldFile("/path/non-existent", 30);
    }
}
