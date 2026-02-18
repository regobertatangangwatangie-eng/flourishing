<?php

declare(strict_types=1);

session_start();

/**
 * Database configuration
 * Use environment variables in production / GitHub Actions.
 */
$servername = getenv('DB_HOST') ?: 'localhost:3306';
$username   = getenv('DB_USER') ?: 'root';
$password   = getenv('DB_PASS') ?: '';
$dbname     = getenv('DB_NAME') ?: 'mybank';

/**
 * Create MySQLi connection
 */
$conn = mysqli_connect($servername, $username, $password, $dbname);

/**
 * Check connection
 */
if ($conn === false) {
    error_log('Database connection failed: ' . mysqli_connect_error());
    http_response_code(500);
    exit('Database connection error.');
}
