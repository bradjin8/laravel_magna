<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $schemaName = config("database.connections.mysql.database", null);

        if ($schemaName == null) {
            return;
        }

        $charset = config("database.connections.mysql.charset", 'utf8mb4');
        $collation = config("database.connections.mysql.collation", 'utf8mb4_unicode_ci');

        $query = "
use `$schemaName`;
CREATE TABLE IF NOT EXISTS `$schemaName`.`categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE $collation NOT NULL,
  `slug` varchar(50) COLLATE $collation NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=$charset COLLATE=$collation;

CREATE TABLE IF NOT EXISTS `$schemaName`.`track_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `type` varchar(10) COLLATE $collation NOT NULL,
  `duration_in_sec` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(100) COLLATE $collation DEFAULT '',
  `visitor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=$charset COLLATE=$collation;

CREATE TABLE IF NOT EXISTS `$schemaName`.`visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relationship` varchar(100) COLLATE $collation NOT NULL,
  `country` varchar(20) COLLATE $collation NOT NULL,
  `how` varchar(100) COLLATE $collation NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=$charset COLLATE=$collation;

INSERT INTO `$schemaName`.`categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Active Aerodynamics', 'active-aerodynamics', 1, '2020-09-01 19:15:51', '2020-09-01 19:15:51'),
(2, 'Advanced Driver', 'advanced-driver', 1, '2020-09-01 19:16:22', '2020-09-01 19:16:22'),
(3, 'Body Exteriors', 'body-exteriors', 1, '2020-09-01 19:17:24', '2020-09-01 19:17:24'),
(4, 'Complete Vehicles', 'complete-vehicles', 1, '2020-09-01 19:17:24', '2020-09-01 19:17:24'),
(5, 'Intelligent Lighting', 'intelligent-lighting', 1, '2020-09-01 19:21:14', '2020-09-01 19:21:14'),
(6, 'Mechatronics', 'mechatronics', 1, '2020-09-01 19:18:13', '2020-09-01 19:18:13'),
(7, 'Scalable Electrification', 'scalable-electrification', 1, '2020-09-01 19:18:13', '2020-09-01 19:18:13'),
(8, 'Seat of the Future', 'seat-of-the-future', 1, '2020-09-01 19:18:40', '2020-09-01 19:18:40'),
(9, 'Welcome Desk', 'welcome-desk', 1, '2020-09-01 19:21:14', '2020-09-01 19:21:14');
";

        \Illuminate\Support\Facades\DB::unprepared($query);
        $this->command->info('Database seeded!');
    }
}
