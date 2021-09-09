<?php

    class crud
    {
        public $mysqli;

        function __construct()
        {
            $connect = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/connection.ini");
            $mysqli = new mysqli("{$connect['address']}", "{$connect['login']}", "{$connect['password']}", "{$connect['db']}");
            $this->mysqli = $mysqli;
            mysqli_set_charset($mysqli, 'utf8');
        }

        function select($value, $table, $where = '', $order = '', $report = '')
        {
            if (stripos($value,"COUNT") !== false) { $value = "{$value} "; }
            elseif ($value != '*') { $value = "`{$value}` "; }
            if ($where != null) { $where = " WHERE {$where} "; }
            if ($order != null) { $order = " ORDER BY {$order} "; }


            if ($report == '1')
            { echo "<div style = 'background: darkblue; color: yellow;'>SELECT {$value} FROM `{$table}`{$where}{$order}{$limit}</div>"; }

            return $this->mysqli->query("SELECT {$value} FROM `{$table}`{$where}{$order}{$limit}");
        }

        function insert($table, $values, $report = '')
        {
            $this->mysqli->query("INSERT INTO `{$table}` VALUES ({$values})");
            if ($report == '1')
            { echo "INSERT INTO `{$table}` VALUES ({$values})<br>"; }

        }

        function update($table, $cell, $value, $where = '', $report = '')
        {
            if ($where != null) { $where = " WHERE {$where}"; }
            $this->mysqli->query("UPDATE `{$table}` SET `{$cell}` = '{$value}'{$where}");
            if ($report == 'true')
            { echo "<div style = 'background: darkblue; color: yellow;'>UPDATE `{$table}` SET `{$cell}` = '{$value}'{$where}</div>"; }
        }
    }

    function pre($arr)
    {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
?>