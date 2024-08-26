<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'backup the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databaseName = env("DB_DATABASE");
        $userName = env("DB_USERNAME");
        $password = env("DB_PASSWORD");
        $host = env("DB_HOST");
        $port = env("DB_PORT");
        $dumpBinFolder = env("DUMP_BIN_FOLDER");
        $date = now()->format('Y-m-d_H-i-s');
        $backup_file = "backup". DIRECTORY_SEPARATOR ."{$databaseName}_{$date}.sql";
        $command = $dumpBinFolder.DIRECTORY_SEPARATOR ."mysqldump --user={$userName} --password={$password} --host={$host} --port={$port} {$databaseName}>".storage_path($backup_file);
        echo $command;
        exec($command,$output, $return);
        if ($return === 0){
            $this->info('Backup successfully created:'.$backup_file);
        }else{
            $this->error('Backup failed.');
        }
    }
}
