<?php
$mysqli = new mysqli("localhost", "root", "", "assignment");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT eid,ename,salary,deptid,designation,mgrid,commission,gender
FROM employees WHERE eid = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s",$_GET["q"]);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($eid, $ename, $esalary, $deptId, $designation, $mgr, $commission,$gen);
$stmt->fetch();
$stmt->close();
?>