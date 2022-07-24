<?php

require_once './includes/database.php';
$departments = $con->query("SELECT * FROM `departments`");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, width=device-width">

  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="/lib/selectize.js/js/selectize.min.js"></script>
  <script src="/js/default.js"></script>
  <script src="/js/submit.js"></script>

  <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/lib/selectize.js/css/selectize.bootstrap5.min.css">
  <link rel="stylesheet" href="/css/default.css">

  <title>Submit Documents</title>
</head>

<body>
  <div class="row gx-0">
    <aside class="sidebar col-2 border-end">
      <div class="border-bottom text-center mb-0 p-3">
        <img src="/img/seal.png" alt="Provincial Government of Negros Occidental Official Seal" class="d-block mx-auto mb-1">
        <strong>Information and Communications Technology - Division</strong>
      </div>

      <div class="list-group list-group-flush">
        <a href="/" id="sidebar-search" class="list-group-item list-group-item-action py-2">Search</a>
        <a href="/submit.php" id="sidebar-submit" class="list-group-item list-group-item-action py-2 active">Submit</a>
      </div>
    </aside>

    <main class="col-10">
      <form id="form-submit" action="/api/submit/" method="post" class="form mb-5">
        <h4>Submit documents</h4>
        <div class="mb-2">
          <label for="department">Department:</label>
          <select id="department" name="department" class="selectize" required>
            <option value="" selected></option>
            <?php while ($dept = $departments->fetch_object()) { ?>
            <option value="<?= $dept->abbr ?>"><?= $dept->name ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="row mb-3">
          <div class="col-6">
            <label for="date">Date: </label>
            <input type="date" id="date" name="date" class="form-control" required>
          </div>

          <div class="col-6">
            <label for="images">Scanned Images: </label>
            <input type="file" id="images" name="images" class="form-control" accept="image/*" multiple required>
          </div>
        </div>

        <div id="submit-status" class="rounded border bg-light d-none p-2 mb-2"></div>

        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-dark">
            <div class="spinner-border spinner-border-sm d-none" role="status"></div>
            <span class="submit-status">Submit</span>
          </button>
        </div>

        <div id="preview-container" class="d-none mt-3">
          <h4 class="mt-4 mb-2">Preview</h4>
          <div id="preview" class="d-flex flex-wrap"></div>
        </div>
        <template id="temp-preview">
          <img src="" alt="" width="300" class="img-thumbnail m-2">
        </template>
      </form>
    </main>
  </div>
</body>
</html>
