<?php

namespace App\Models;

use Core\Model;
use PDO;
use PDOException;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Post extends Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        // $host = 'localhost';
        // $dbname = 'mvc';
        // $username = 'root';
        // $password = '';

        try {

            // $db = new PDO(
            //     "mysql:host=$host;dbname=$dbname;charset=utf8",
            //     $username,
            //     $password
            // );
            $db = static::getDB();

            $stmt = $db->query('SELECT id, title, content FROM posts
                                ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}