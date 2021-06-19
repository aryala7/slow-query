<?php

return [

    'general' => [
        /*
         * Directory where log files will be saved
         */
        'directory' => storage_path(env('SQL_LOGGER_DIRECTORY', 'logs/database')),
    ],

    'all_queries' => [
        /*
         * Whether all SQL queries should be logged
         */
        'enabled' => env('SQL_LOGGER_ALL_QUERIES_ENABLED', false),
        /*
         * Log file name without extension - elements between [ and ] characters will be parsed
         * according to format used by http://php.net/manual/en/function.date.php
         */
        'file_name' => env('SQL_LOGGER_ALL_QUERIES_FILE_NAME', 'log-'),
    ],

    'slow_queries' => [
        /*
         * Whether slow SQL queries should be logged (you can log all queries and
         * also slow queries in separate file or you might to want log only slow
         * queries)
         */
        'enabled' => env('SQL_LOGGER_SLOW_QUERIES_ENABLED', false),

        /*
         * Time of query (in milliseconds) when this query is considered as slow
         */
        'min_exec_time' => env('SQL_LOGGER_SLOW_QUERIES_MIN_EXEC_TIME', 30),
        /*
         * Slow log file name without extension - elements between [ and ] characters will be parsed
         * according to format used by http://php.net/manual/en/function.date.php
         */
        'file_name' => env('SQL_LOGGER_SLOW_QUERIES_FILE_NAME', 'slow-'),
    ],
];
