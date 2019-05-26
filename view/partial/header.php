<div class="top-menu-secondary color-scheme-dark">
  <ul>
    <li class="active">
      <a href="#">All</a>
    </li>
    <li>
      <a href="#">My Uploads</a>
    </li>
  </ul>
  <div class="top-menu-controls">
    <div class="element-search hidden-lg-down">
      <input placeholder="Start typing to search..." type="text">
    </div>
    <div class="top-icon top-search hidden-xl-up">
      <i class="os-icon os-icon-ui-37"></i>
    </div>
    <!--------------------
    START - User avatar and menu in secondary top menu
    -------------------->
    <div class="logged-user-w">
      <div class="logged-user-i">
        <div class="avatar-w">
          <img alt="" src="./uploads/<?php echo $_SESSION['image']; ?>">
        </div>
        <div class="logged-user-menu">
          <div class="logged-user-avatar-info">
            <div class="avatar-w">
              <img alt="" src="./uploads/<?php echo $_SESSION['image']; ?>">
            </div>
            <div class="logged-user-info-w">
              <div class="logged-user-name">
                <?php echo $_SESSION['full_name']; ?>
              </div>
              <div class="logged-user-role">
                Administrator
              </div>
            </div>
          </div>
          <div class="bg-icon">
            <i class="os-icon os-icon-wallet-loaded"></i>
          </div>
          <ul>
            <!-- <li>
              <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
            </li> -->
            <li>
              <a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--------------------
    END - User avatar and menu in secondary top menu
    -------------------->
  </div>
</div>