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
  <script src="/js/search.js"></script>

  <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/lib/selectize.js/css/selectize.bootstrap5.min.css">
  <link rel="stylesheet" href="/css/default.css">
  <link rel="stylesheet" href="/css/search.css">

  <title>Search Documents</title>
</head>

<body>
  <div class="row gx-0">
    <aside class="sidebar col-2 border-end">
      <div class="border-bottom text-center mb-0 p-3">
        <img src="/img/seal.png" alt="Provincial Government of Negros Occidental Official Seal" class="d-block mx-auto mb-1">
        <strong>Information and Communications Technology - Division</strong>
      </div>

      <div class="list-group list-group-flush">
        <a href="/" id="sidebar-search" class="list-group-item list-group-item-action py-2 active">Search</a>
        <a href="/submit.php" id="sidebar-submit" class="list-group-item list-group-item-action py-2">Submit</a>
      </div>
    </aside>

    <main class="col-10">
      <form id="form-search" action="/api/search/" method="post" class="form">
        <h4>Search documents</h4>
        <div class="mb-2">
          <label for="department">Department:</label>
          <select id="department" name="department" class="selectize">
            <option value="" selected></option>
            <?php while ($dept = $departments->fetch_object()): ?>
            <option value="<?= $dept->abbr ?>"><?= $dept->name ?></option>
            <?php endwhile ?>
          </select>
        </div>

        <div class="row mb-3">
          <div class="col-6">
            <label for="date-from">From: </label>
            <input type="month" id="date-from" name="from" class="form-control">
          </div>

          <div class="col-6">
            <label for="date-to">To: </label>
            <input type="month" id="date-to" name="to" class="form-control">
          </div>
        </div>

        <div id="search-status" class="rounded border border-danger bg-light d-none p-2 mb-2"></div>

        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-dark">
            <div class="spinner-border spinner-border-sm d-none" role="status"></div>
            <span class="submit-status">Search</span>
          </button>
        </div>
      </form>

      <div id="results-container" class="d-none mt-3">
        <h4 class="results-header"><span id="results-count"></span> result(s) found</h4>
        <div id="results-carousel" class="carousel carousel-dark slide py-5">
          <div id="indicators" class="carousel-indicators"></div>
          <div id="results" class="carousel-inner"></div>
          <button type="button" class="carousel-control-prev" data-bs-target="#results-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button type="button" class="carousel-control-next" data-bs-target="#results-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <template id="temp-indicator">
        <button type="button" data-bs-target="#results-carousel" class="indicator" aria-label="Slide"></button>
      </template>
      <template id="temp-result">
        <div class="carousel-item">
          <div class="result-imgs d-flex flex-wrap justify-content-center"></div>
          <div class="carousel-caption border rounded bg-dark text-white col-6 mx-auto d-none d-md-block">
            <h5 class="dept-name"></h5>
            <p class="doc-date">April 27, 2022</p>
          </div>
        </div>
      </template>
    </main>
  </div>

  <div id="full-image" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <a href="" class="full-image-open btn btn-dark mb-2" role="button">Open Image in New Tab</a>
          <img src="" alt="" class="full-image-img img-thumbnail">
        </div>
      </div>
    </div>
  </div>
</body>
</html>
