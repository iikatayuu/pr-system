<?php

require_once '../../includes/database.php';

header('Content-Type: application/json');
$result = [
  'success' => false,
  'message' => ''
];

$dept = isset($_POST['department']) ? $con->real_escape_string($_POST['department']) : null;
$date = isset($_POST['date']) ? $con->real_escape_string($_POST['date']) : null;
$pages = isset($_FILES['images']) ? $_FILES['images'] : null;

if ($dept === null || $date === null || $pages === null) {
  $result['message'] = 'Invalid parameters';
  die(json_encode($result));
}

if (count($pages['name']) === 0) {
  $result['message'] = 'No images uploaded';
  die(json_encode($result));
}

$con->query("INSERT INTO `documents` (`department`, `date`) VALUES ('$dept', '$date')");
$id = $con->insert_id;
for ($i = 0; $i < count($pages['name']); $i++) {
  $fileinfo = pathinfo($pages['name'][$i]);
  $ext = $fileinfo['extension'];
  $filepath = "../../data/$id/$i.$ext";

  mkdir("../../data/$id");
  if (!move_uploaded_file($pages['tmp_name'][$i], $filepath)) {
    $result['message'] = 'Unable to move uploaded file';
    die(json_encode($result));
  }
}

$result['success'] = true;
echo json_encode($result);

?>
