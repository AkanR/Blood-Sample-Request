<?php require './dbfunctions/config.php'; ?>
<header id="hdesign">
  <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark" style="color: white; background-color:black; ">
    <div class="container">
      <a class="navbar-brand" href="./addsamples.php" style="font-weight: 700; font-size:30px;"><i>Request Blood</i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown" style="font-family: 'unbuntu'; font-size: 20px;">
        <ul class="navbar navbar-nav end">
          <li class="nav-item">
            <a class="nav-link" href="./addsamples.php" style="color: white;"><b>Add samples</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./view-requests.php" style="color: white;"><b>View Requests</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./logout.php" style="color: white;"><b>Logout</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>