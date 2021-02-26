<?php
require __DIR__."/../config/database.php";
$GLOBALS['db'] = $db;
date_default_timezone_set("Asia/Kolkata");
class DB
{
    var $link;
    var $db;
    var $db_name, $host, $user, $pwd;
    public function __construct()
    {
        $this->db_name = $GLOBALS['db']['dbname'];
        $this->host = $GLOBALS['db']['host'];
        $this->user = $GLOBALS['db']['user'];
        $this->pwd = $GLOBALS['db']['password'];
        $this->link = mysqli_connect($this->host, $this->user, $this->pwd, $this->db_name);
        if(!$this->link)
            die('Error: '.mysqli_connect_error());
    }

    // TODO: Insert
    public function insert($table, $data)
    {
        $fields = "";
        $values = "";
        $i = 1;
        $total_cnt = count($data);
        foreach($data as $key => $val)
        {
            // TODO: FIELDS
            if($i < $total_cnt)
                $fields .= "`".$key."`,";
            else
                $fields .= "`".$key."`";

            // TODO: VALUES
            if($i < $total_cnt)
                $values .= "'".mysqli_real_escape_string($this->link, $val)."',";
            else
                $values .= "'".mysqli_real_escape_string($this->link, $val)."'";
            $i++;
        }
        $query = "INSERT INTO `".$table."` (".$fields.") VALUES (".$values.")";
        $query = str_replace("'NULL'", "NULL", $query);
        mysqli_query($this->link, $query);
        if(mysqli_affected_rows($this->link) > 0)
            return true;
        else
            return false;
    }

    // TODO: get last insert id
    public function insert_id()
    {
        return mysqli_insert_id($this->link);
    }

    // TODO: Batch insert
    public function insert_batch($table, $data)
    {
        $fields = "";
        $values = "";
        $i = 1;
        // set fields
        $total_cnt = count($data[0]);
        foreach($data[0] as $key => $val)
        {
            // TODO: FIELDS
            if($i < $total_cnt)
                $fields .= "`".$key."`,";
            else
                $fields .= "`".$key."`";
            $i++;
        }

        $query = "INSERT INTO `".$table."` (".$fields.") VALUES";
        $total_entries = count($data);
        $total_entries = $total_entries - 1;
        foreach($data as $key => $val)
        {
            $total_cnt = count($val);
            $i = 1;
            foreach($val as $k => $v)
            {
                // TODO: VALUES
                if($i == 1)
                    $query .= " (";
                if($i < $total_cnt)
                    $query .= "'".mysqli_real_escape_string($this->link, $v)."', ";
                else
                    $query .= "'".mysqli_real_escape_string($this->link, $v)."')".($key < $total_entries ? "," : "");
                $i++;
            }
        }
        // echo $query;
        $query = str_replace("'NULL'", "NULL", $query);
        mysqli_query($this->link, $query);
        if(mysqli_affected_rows($this->link) > 0)
            return true;
        else
            return false;
    }

    // TODO: select query
    public function get($table, $where, $attributes)
    {
        $query = "SELECT ".($attributes == '' ? "*" : $attributes)."
                FROM `".$table."`";
        if($where != '')
            $query .= " WHERE ".$where;

        $result = mysqli_query($this->link, $query) or die("Error: ".mysqli_error($this->link));
        $list = array();
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($list, $row);
            }
        }
        return $list;
    }

    // TODO: get single column
    public function getColumn($table, $where, $column)
    {
        $query = "SELECT *
                FROM `".$table."`";
        if($where != '')
            $query .= " WHERE ".$where;
        $result = mysqli_query($this->link, $query) or die("Error: ".mysqli_error($this->link));
        $row = mysqli_fetch_assoc($result);
        return $row[$column];
    }

    // TODO: select query in order
    public function getOrderBy($table, $where, $order, $attributes)
    {
        $query = "SELECT ".($attributes == '' ? "*" : $attributes)."
                FROM `".$table."`";
        if($where != '')
            $query .= " WHERE ".$where;
        if($order != '')
            $query .= " ORDER BY ".$order;
        $result = mysqli_query($this->link, $query) or die("Error: ".mysqli_error($this->link));
        $list = array();
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($list, $row);
            }
        }
        return $list;
    }

    // TODO: get count
    public function getCount($table, $where)
    {
        $query = "SELECT COUNT(*) as cnt
                FROM `".$table."`";
        if($where != '')
            $query .= " WHERE ".$where;

        $result = mysqli_query($this->link, $query) or die("Error: ".mysqli_error($this->link));
        $row = mysqli_fetch_assoc($result);
        return $row['cnt'];
    }

    // TODO: delete query
    public function delete($table, $where)
    {
        $query = "DELETE FROM `".$table."`";
        if($where != '')
            $query .= " WHERE ".$where;
        mysqli_query($this->link, $query);
        if(mysqli_affected_rows($this->link) > 0)
            return true;
        else
            return false;
    }

    // TODO: update query
    public function update($table, $where, $attributes)
    {
        $query = "UPDATE `".$table."` SET ".$attributes;
        if($where != '')
            $query .= " WHERE ".$where;
        $query = str_replace("'NULL'", "NULL", $query);
        mysqli_query($this->link, $query);
        if(mysqli_affected_rows($this->link) > 0)
            return true;
        else
            return false;
    }

    public function selectQuery($query)
    {
        $result = mysqli_query($this->link, $query) or die("Error: ".mysqli_error($this->link));
        $list = array();
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($list, $row);
            }
        }
        return $list;
    }

    public function error()
    {
        $error = [
            "code" => mysqli_errno($this->link),
            "error" => mysqli_error($this->link)
        ];
        return (object)$error;
    }

    public function truncate($table)
    {
        mysqli_query($this->link, "DELETE FROM `".$table."`");
        mysqli_query($this->link, "ALTER TABLE `".$table."` AUTO_INCREMENT = 1");
        return true;
    }
}
?>
