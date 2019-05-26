<!-- templates files -->
<script async="" src="https://www.google-analytics.com/analytics.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/chart.js/dist/Chart.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="bower_components/bootstrap-validator/dist/validator.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/dropzone/dist/dropzone.js"></script>
<script src="bower_components/editable-table/mindmup-editabletable.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="bower_components/tether/dist/js/tether.min.js"></script>
<script src="bower_components/bootstrap/js/dist/util.js"></script>
<script src="bower_components/bootstrap/js/dist/alert.js"></script>
<script src="bower_components/bootstrap/js/dist/button.js"></script>
<script src="bower_components/bootstrap/js/dist/carousel.js"></script>
<script src="bower_components/bootstrap/js/dist/collapse.js"></script>
<script src="bower_components/bootstrap/js/dist/dropdown.js"></script>
<script src="bower_components/bootstrap/js/dist/modal.js"></script>
<script src="bower_components/bootstrap/js/dist/tab.js"></script>
<script src="bower_components/bootstrap/js/dist/tooltip.js"></script>
<script src="bower_components/bootstrap/js/dist/popover.js"></script>
<script src="js/main.js?version=3.5.1"></script>

<!-- useful filles -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsrender/0.9.90/jsrender.js"></script>

<script>
  (function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

  ga('create', 'UA-XXXXXXXX-X', 'auto');
  ga('send', 'pageview');
</script>

<!-- New JS ######################################################### -->
<script src="bower_upgrade/popper.min.js"></script>
<script src="bower_upgrade/demo_customizer.js?version=4.4.1"></script>


<!-- menu and headers locations -->
<script>
  $('.home').on('click', function() {
    alert('clicked')
    window.location.href = 'main.php?startDate=' + querySelector['startDate'] + '&endDate=' + querySelector.endDate + '&location=Home';
  });
  $('.profile').on('click', function() {
    window.location.href = 'profile.php?startDate=' + querySelector['startDate'] + '&endDate=' + querySelector.endDate + '&location=Profile';
  });
  $('.search').on('click', function() {
    window.location.href = 'search.php?startDate=' + querySelector['startDate'] + '&endDate=' + querySelector.endDate + '&location=Search Post';
  });
  $('.logout').on('click', function() {
    window.location.href = 'logout.php?startDate=' + querySelector['startDate'] + '&endDate=' + querySelector.endDate + '&location=Search Post';
  });
</script>