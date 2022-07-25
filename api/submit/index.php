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
mkdir("../../data/$id", 0750);

for ($i = 0; $i < count($pages['name']); $i++) {
  $fileinfo = pathinfo($pages['name'][$i]);
  $ext = $fileinfo['extension'];
  $filepath = "../../data/$id/$i.$ext";

  if (!move_uploaded_file($pages['tmp_name'][$i], $filepath)) {
    $error_code = $pages['error'][$i];
    switch ($error_code) {
      case UPLOAD_ERR_INI_SIZE:
        $result['message'] = 'Uploaded file exceeds the upload_max_filesize directive in php.ini';
        break;

      case UPLOAD_ERR_FORM_SIZE:
        $result['message'] = 'Uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        break;

      case UPLOAD_ERR_PARTIAL:
        $result['message'] = 'Uploaded file was only partially uploaded';
        break;

      case UPLOAD_ERR_NO_FILE:
        $result['message'] = 'No file was uploaded';
        break;

      case UPLOAD_ERR_NO_TMP_DIR:
        $result['message'] = 'Missing a temporary folder';
        break;

      case UPLOAD_ERR_CANT_WRITE:
        $result['message'] = 'Failed to write to disk';
        break;

      case UPLOAD_ERR_EXTENSION:
        $result['message'] = 'A PHP extension stopped the file upload';
        break;

      default:
        $result['message'] = 'Unknown error';
    }

    $con->query("DELETE FROM `documents` WHERE `id`=$id");
    die(json_encode($result));
  }
}

$result['success'] = true;
echo json_encode($result);

?>
