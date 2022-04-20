<?php
require_once('../Connect.php');

$PDOConnect = new PDOConnect();
$pdo = $PDOConnect->pdo;

$main_data = array();

if ( isset($_POST['FilterData']) ) {
    $filterData = $_POST['FilterData'];
    $project_name = $filterData['ProjectCity'];
}
// $main_data['Message'] = $project_name;
$query = "SELECT * FROM projects";

$conditions = array();
if(! empty($project_name)) {
    $conditions[] = "ProjectCity LIKE '%$project_name%'";
}
// if(! empty($partner_phone)) {
//     $conditions[] = "PartnerName='$partner_phone'";
// }
$sql = $query;
if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(' AND ', $conditions);
}
$result = $pdo->query($sql);

foreach($result as $row){
    $p_array = array();
    $p_array["ProjectID"] = $row["ProjectID"];
    $p_array["ProjectCity"] = $row["ProjectCity"];
    $p_array["ProjectStreet"] = $row["ProjectStreet"];
    $p_array["ProjectType"] = $row["ProjectType"];
    $main_data['Data'][] =$p_array;
}

$json = json_encode($main_data);
print_r($json);

?>
