<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <!-- all css liks ################################################################################################### -->
  <?php include './partial/links-without-session.php' ?>
</head>

<body class="auth-wrapper">
  <div class="all-wrapper menu-side with-pattern">
    <?php
    // remove all session variables
    session_unset();

    // destroy the session 
    session_destroy();

    ?>
    <div class="content-box">
      <div class="big-error-w">
        <h2>
          Loged Out!
        </h2>
        <h5>
          You Loged Out Successfully
        </h5>
        <h4>
          See You Later...
        </h4>
        <form>
          <div class="input-group">
            <div class="input-group-btn">
              <a class="btn btn-primary" href="login.php" style="color: white; text-decoration: none;">
                Login Again
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
</body>

</html>