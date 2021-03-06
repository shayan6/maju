<div class="desktop-menu menu-side-w menu-activated-on-click">
  <div class="logo-w home">
    <a class="logo" href="javacript:void(0)"><img class="majuLogo" src="img/maju_logo.png"></a>
  </div>
  <div class="menu-and-user">
    <ul class="main-menu">
      <li class="has-sub-menu">
        <a class="home" href="javascript:void(0)">
          <div class="icon-w">
            <div class="os-icon os-icon-window-content"></div>
          </div>
          <span>Home</span>
        </a>
      </li>
      <li class="has-sub-menu">
        <a class="profile" href="javascript:void(0)">
          <div class="icon-w">
            <div class="os-icon os-icon-user-male-circle"></div>
          </div>
          <span>Profile</span>
        </a>
      </li>

      <?php if (in_array(3, $_SESSION['access'])) { ?>
        <!-- create user access -->
        <li class="has-sub-menu">
          <a class="createUser" href="javascript:void(0)">
            <div class="icon-w">
              <div class="os-icon os-icon-users"></div>
            </div>
            <span>Create User</span>
          </a>
        </li>
      <?php } ?>

      <li class="has-sub-menu">
        <a class="search" href="javascript:void(0)">
          <div class="icon-w">
            <div class="os-icon os-icon-search"></div>
          </div>
          <span>Search</span>
        </a>
      </li>

      <?php if (in_array(2, $_SESSION['access'])) { ?>
        <!-- upload access -->
        <li class="has-sub-menu">
          <a class="uploads myUploads" href="javascript:void(0)">
            <div class="icon-w">
              <div class="os-icon os-icon-delivery-box-2"></div>
            </div>
            <span>My Uploads</span>
          </a>
        </li>
      <?php } ?>

      <?php if (in_array(1, $_SESSION['access'])) { ?>
        <!-- stats acces -->
        <li class="has-sub-menu">
          <a class="statistics" href="javascript:void(0)">
            <div class="icon-w">
              <div class="os-icon os-icon-bar-chart-stats-up"></div>
            </div>
            <span>Statistics</span>
          </a>
        </li>
      <?php } ?>

      <li class="has-sub-menu">
        <a class="profile" href="javascript:void(0)">
          <div class="icon-w">
            <div class="os-icon os-icon-pencil-12"></div>
          </div>
          <span>Settings</span>
        </a>
      </li>
      <!-- <li class="has-sub-menu">
          <a href="javascript:void(0)">
            <div class="icon-w">
              <div class="os-icon os-icon-tasks-checked"></div>
            </div>
            <span>Marks</span>
          </a>
        </li> -->
      <li class="has-sub-menu">
        <a class="logout" href="javascript:void(0)">
          <div class="icon-w">
            <div class="os-icon os-icon-signs-11"></div>
          </div>
          <span>Logout</span>
        </a>
      </li>
    </ul>
  </div>
</div>