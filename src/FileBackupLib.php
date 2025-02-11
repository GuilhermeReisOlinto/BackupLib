<?php

namespace FileBackupLib;

class FileBackupLib
{
    public function compress($source, $destination)
    {
        if (!file_exists($source)) {
            throw new \Exception("The directory is not exists \n");
        }

        $command = "tar -czf $destination $source";
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            throw new \Exception("Error for compact the directory \n");
        }

        return "Backup successfully created: $destination \n";
    }

    public function sync($source, $destination)
    {
        if (!file_exists($source)) {
            throw new \Exception("The directory not exists \n");
        }

        $command = "rsync -avz $source $destination";
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            throw new \Exception("Syncronizer error in archive \n");
        }

        return "Syncronize completed for $destination \n";
    }

    public function cleanOldFile($path, $days)
    {
        if (!file_exists($path)) {
            throw new \Exception("The path not-exists \n");
        }

        $command = "find $path -type f -mtime +$days -delete";
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            throw new \Exception("Error in clean old file \n");
        }

        return "Files older than $days days were removed \n";
    }
}
