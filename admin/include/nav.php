<?php include_once("logincheck.php"); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand brand" href="#">
    <img src="img/logo.png" alt="">PLAYAREA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="mr-auto">
    </div>

    <ul class="navbar-nav">

    <li class="nav-item ">
      <a class="nav-link text-nav" href="dashboard.php">Today's Booking </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link text-nav" href="reports.php">Reports</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link text-nav" href="blockslot.php">Block Slots</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link text-nav" href="users.php">Users</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link text-nav" href="pricing.php">Pricing</a>
    </li>
    <!--<li class="nav-item">
      <a class="nav-link text-nav" href="#">Settings </a>
    </li>-->
      <li class="nav-item">
        <a class="nav-link btn btn-danger text-light" href="logout.php">
          <?php echo $username;?>
          <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="fill: white;" viewBox="0 0 8 8">
            <path d="M3 0v1h4v5h-4v1h5v-7h-5zm-1 2l-2 1.5 2 1.5v-1h4v-1h-4v-1z" />
          </svg></i>
         </a>

</button>
      </li>

    </ul>

  </div>
</nav>
