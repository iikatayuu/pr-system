<?php

require_once '../../includes/database.php';

header('Content-Type: application/json');
ini_set('display_errors', '1');
error_reporting(E_ALL);
$result = [
  'success' => false,
  'message' => ''
];

$dept = !empty($_POST['department']) ? $con->real_escape_string($_POST['department']) : null;
$date_from = !empty($_POST['from']) ? $con->real_escape_string($_POST['from']) : null;
$date_to = !empty($_POST['to']) ? $con->real_escape_string($_POST['to']) : null;

$filter = [];
if ($dept !== null) $filter[] = "`department`='$dept'";

if ($date_from !== null) {
  $date_from .= '-01';
  $filter[] = "`date`>='$date_from'";
}

if ($date_to !== null) {
  $parts = explode('-', $date_to);
  $year = intval($parts[0]);
  $month = intval($parts[1]);
  $days = date('t', mktime(0, 0, 0, $month, 1, $year));
  $date_to .= "-$days";
  $filter[] = "`date`<='$date_to'";
}

$where = implode(' AND ', $filter);
$where = count($filter) > 0 ? "WHERE $where" : '';
$docs = $con->query("SELECT `documents`.*,`departments`.`name` FROM `documents` JOIN `departments` ON `departments`.`abbr`=`documents`.`department` $where ORDER BY `documents`.`date` DESC");
$results = [];

function files_to_url ($file) {
  return substr($file, 5);
}

while ($doc = $docs->fetch_assoc()) {
  $id = $doc['id'];
  $files = glob("../../data/$id/*");
  $urls = array_map('files_to_url', $files);
  $doc['images'] = $urls;
  $results[] = $doc;
}

$result['success'] = true;
$result['results'] = $results;

echo json_encode($result);

?>
