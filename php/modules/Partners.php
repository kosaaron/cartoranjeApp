<?php
require_once('../Connect.php');

$PDOConnect = new PDOConnect();
$pdo = $PDOConnect->pdo;

$main_data = array();

if ( isset($_POST['FilterData']) ) {
    $filterData = $_POST['FilterData'];
    $partner_name = $filterData['PartnerName'];
}
// $main_data['Message'] = $partner_name;
$query = "SELECT * FROM partners";

$conditions = array();
if(! empty($partner_name)) {
    $conditions[] = "PartnerName LIKE '%$partner_name%'";
}
// if(! empty($partner_phone)) {
//     $conditions[] = "PartnerName='$partner_phone'";
// }
$sql = $query;
if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(' AND ', $conditions);
}
$result = $pdo->query($sql);
// $main_data['SQL'] = $sql;

foreach($result as $row){
    $p_array = array();
    $p_array["PartnerID"] = $row["PartnerID"];
    $p_array["PartnerName"] = $row["PartnerName"];
    $p_array["PartnerPhone"] = $row["PartnerPhone"];
    $p_array["PartnerEmail"] = $row["PartnerEmail"];
    $main_data['Data'][] =$p_array;
}

$json = json_encode($main_data);
print_r($json);

?>
