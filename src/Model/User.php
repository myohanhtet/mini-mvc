<?php

namespace Myohanhtet\Model;

use InvalidArgumentException;
use Myohanhtet\Config\DB;
use Myohanhtet\Config\MyLogger;
use PDO;

class User
{

    /**
     * @param ...$column
     * @return bool|array
     */
    public static function all(...$column): bool|array
    {
        //Todo : pagination
        if (!empty($column)) {
          $columns = implode(', ',$column);
            $query = "SELECT $columns FROM users";
        } else {
            $query = "SELECT * FROM users";
        }

        $stmt = Db::getInstance()->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function findById($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = Db::getInstance()->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $userCode
     * @return mixed
     */
    public static function findByUserCode($userCode)
    {
        $query = "SELECT * FROM users WHERE user_code = :user_code";
        $stmt = Db::getInstance()->prepare($query);
        $stmt->execute(['user_code' => $userCode]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $data
     * @return bool|string
     */
    public static function create($data): bool|string
    {
        // Hash the password before saving to the database
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $query = "INSERT INTO users (name, username, user_code, email, password, created_at, updated_at) 
              VALUES (:name, :username, :user_code, :email, :password, NOW(), NOW())";

        $stmt = Db::getInstance()->prepare($query);

        // Bind parameters
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':user_code', $data['user_code']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);

        // Execute the statement
        $stmt->execute();

        return Db::getInstance()->lastInsertId();
    }

    /**
     * @param $column
     * @param $opt
     * @param $value
     * @return mixed|null
     */
    public static function where($column, $opt, $value)
    {
        $validOperators = ['=', '>', '<', '>=', '<=','!='];
        if (!in_array($opt, $validOperators)) {
            throw new InvalidArgumentException("Invalid operator: $opt");
        }
        $query = "SELECT * FROM users WHERE $column $opt :value";
        $stmt = Db::getInstance()->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }

    /**
     * @param $id
     * @param $data
     * @return int
     */
    public static function update($id, $data): int
    {
        try{
            if (empty($data['password'])){
                unset($data['password']);
            } else {
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            }
            $data['updated_at'] = date('Y-m-d H:i:s');
            $updateColumns = array_map(function ($column) {
                return "$column = :$column";
            }, array_keys($data));
            $updateColumns = implode(', ', $updateColumns);
            $query = "UPDATE users SET $updateColumns WHERE id = :id";
            $data['id'] = $id;
            $stmt = Db::getInstance()->prepare($query);
            $stmt->execute($data);
            return $stmt->rowCount();
        } catch (\Exception $e) {
            MyLogger::getLogger()->error("Exception happened in user update: " . $e->getMessage());
            return 0;
        }

    }

    /**
     * @param $id
     * @return int
     */
    public static function delete($id): int
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = Db::getInstance()->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}