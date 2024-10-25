<?php

namespace public;

use PDO;

class View
{
    private object $pdo;
    private string $tableName;

    /**
     * @param object $pdo
     * @param string $tableName
     */
    public function __construct(object $pdo, string $tableName)
    {
        $this->pdo = $pdo;
        $this->tableName = $tableName;
    }

    public function fetchTable()
    {
        $sql = "SELECT * FROM" . " " . $this->tableName;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function renderTable()
    {
        $data = $this->fetchTable();

        if (empty($data)){
            die("Нет данных для отображения");
        }

        echo "<table>";
        echo "<tr>";
        foreach (array_keys($data[0]) as $value){
            echo "<th>" . $value . "</th>";
        }
        echo "<tr>";


        foreach ($data as $row){
            echo "<tr>";
               foreach ($row as $value){
                   echo "<td>" . $value . "</td>";
               }
            echo "</tr>";
        }
        echo "</table>";
    }


}