<div id="loading"></div>
<div id="page">
</div>
<div class="bg-white topbar">
  <div class="row">
    <div class="col-md-4 d-flex align-items-center">
      <div class="search-field d-none d-md-block">
        <form class="d-flex align-items-center h-100 pl-4" action="#">
          <div class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </div>
          <div class="input-group">
            <div class="input-group-prepend bg-transparent">
              <i class="input-group-text border-0 mdi mdi-magnify"></i>
            </div>
            <input type="text" class="form-control bg-transparent border-0" placeholder="Search booking">
          </div>

        </form>
      </div>
    </div>
    <div class="col-md-4">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo " href="dashboard.php"><img class="img-avatar"
            style="height: 70px; width: auto;" src="assets/img/companyimages/logo.jpg" alt=""></a>


      </div>
    </div>
    <div class="col-md-4">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row bg-white">
        <div class="navbar-menu-wrapper d-flex align-items-stretch w-100 ">
          <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item nav-profile dropdown">
              <?php
              $aid = $_SESSION['odmsaid'];
              $sql = "SELECT * from  tbladmin where ID=:aid";
              $query = $dbh->prepare($sql);
              $query->bindParam(':aid', $aid, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $row) {
                  ?>
                  <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">
                    <div class="nav-profile-img">
                      <?php
                      if ($row->Photo == "avatar15.jpg") {
                        ?>
                        <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                        <?php
                      } else {
                        ?>
                        <img class="img-avatar" src="assets/img/profileimages/<?php echo $row->Photo; ?>" alt="">
                        <?php
                      } ?>
                    </div>
                    <div class="nav-profile-text ">
                      <p class="mb-1 text-dark"><?php echo $row->FirstName; ?>     <?php echo $row->LastName; ?></p>
                    </div>
                  </a>
                  <?php
                }
              } ?>

              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="mdi mdi-account mr-2 text-success"></i> Profile </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="change_password.php"><i class="mdi mdi-key mr-2 text-success"></i> Change
                  Password </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="mdi mdi-logout mr-2 text-danger"></i> Signout </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>


  </div>
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row">

    <div class="navbar-menu-wrapper d-flex align-items-stretch w-100">


      <ul class="navbar-nav navbar-nav-left">
        <li class="nav-item dropdown">
          <a class="nav-link" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="manage_event.php">Manage Events</a>
        </li>
        <!-- <li class="nav-item dropdown">
            <a class="nav-link" href="manage_service.php">Manage Service</a>
          </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Booking management</a>
          <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
            <a class="dropdown-item" href="new_bookings.php">New Bookings</a>
            <a class="dropdown-item" href="approved_bookings.php">Approved Bookings</a>
            <a class="dropdown-item" href="cancelled_bookings.php">Cancelled Bookings</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" href="companyprofile.php">Institute</a>
        </li>


        <?php
        $aid = $_SESSION['odmsaid'];
        $sql = "SELECT * from  tbladmin where ID=:aid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':aid', $aid, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
          foreach ($results as $row) {
            if ($row->AdminName == "Admin") {
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">User management</a>
                <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="userregister.php">Manage users</a>
                  <?php
                  $aid = $_SESSION['odmsaid'];
                  $sql = "SELECT * from  tbladmin where ID=:aid";
                  $query = $dbh->prepare($sql);
                  $query->bindParam(':aid', $aid, PDO::PARAM_STR);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  $cnt = 1;
                  if ($query->rowCount() > 0) {
                    foreach ($results as $row) {
                      if ($row->AdminName == "Admin") {
                        ?>
                        <a class="dropdown-item" href="user_permission.php">User Roles</a>

                        <?php
                      }
                    }
                  } ?>
                </div>
              </li>
              <?php
            }
          }
        } ?>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Reports</a>
          <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
            <a class="dropdown-item" href="event_report.php">Events List Reports</a>
            <a class="dropdown-item" href="services_report.php">Services List Reports</a>
            <a class="dropdown-item" href="booking_report.php">Booking Reports</a>
            <a class="dropdown-item" href="btndates_report.php">Btndates Reports</a>

          </div>
        </li> -->

        <!-- <li class="nav-item">
          <a class="nav-link" target="_blank"
            href="https://api.whatsapp.com/send?phone=919423979339&text=Hi%20Nikhil,%20I%20saw%20your%20Project%20named%20as%20Royal%20Event%20Software.%20I%20need%20your%20help%20for%20the%20same.">
            <span class="menu-title">Contact Author</span>
          </a>
        </li> -->

        <!-- <li class="nav-item">
          <a class="nav-link" target="_blank" href="https://www.youtube.com/c/NikhilBhalerao?sub_confirmation=1">
            <span class="menu-title">Other Projects</span>
          </a>
        </li> -->

      </ul>

      <ul class="navbar-nav navbar-nav-right">




      </ul>
    </div>
  </nav>


  <script>
    $(window).scroll(function () {
      console.log($(window).scrollTop())
      if ($(window).scrollTop() > 63) {
        $('.navbar').addClass('navbar-fixed');
      }
      if ($(window).scrollTop() < 64) {
        $('.navbar').removeClass('navbar-fixed');
      }
    });
  </script>
  <style>
    .navbar-fixed {
      top: 0;
      z-index: 100;
      position: fixed;
      width: 100%;
    }
  </style>