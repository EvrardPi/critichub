<?php 
namespace App\Models;

use App\Core\SQL;


class DatabaseInitializer extends SQL
{
    public function initializeDatabase(string $configFile): void
    {

        $sql = file_get_contents($configFile);

        $queries = explode(';', $sql);

        foreach ($queries as $query) {
            $query = trim($query);
            if (!empty($query)) {
                $this->pdo->exec($query);
            }
        }

    }
}