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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>

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
  $('.statistics').on('click', function() {
    window.location.href = 'statistics.php?startDate=' + querySelector['startDate'] + '&endDate=' + querySelector.endDate + '&location=Search Post';
  });
</script>


<!-- funtions by me #################################################### -->
<script>
  // sweet alert

  const swalWithBootstrapButtons = swal.mixin({
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false,
  });


  function genPDF() {
    html2canvas(document.getElementById("HTMLtoPDF"), {
      onrendered: function(canvas) {
        var img = canvas.toDataURL("image/png");
        var doc = new jsPDF();
        doc.addImage(img, 'JPEG', 5, 8, 200, 120);
        doc.setPage(2);
        doc.internal.getNumberOfPages();
        var dateName = document.getElementById('dateSpan').innerHTML;
        doc.save(querySelector['location'] + ' ( ' + dateName + ' ) ' + '.pdf'); // file name pdf
      }
    });
  }

  function parseDate(str) { //calculate date difference
    var mdy = str.split('/');
    return new Date(mdy[2], mdy[0] - 1, mdy[1]);
  }

  function datediff(first, second) {
    // Take the difference between the dates and divide by milliseconds per day.
    // Round to nearest whole number to deal with DST.
    return Math.round((second - first) / (1000 * 60 * 60 * 24));
  }

  function genTablePDF() {
    html2canvas(document.getElementById("HTMLtoPDF"), {
      onrendered: function(canvas) {
        var img = canvas.toDataURL("image/png");
        var doc = new jsPDF();
        var heightSize = document.getElementById('pageSize').value;
        if (+heightSize === 7) {
          heightSize = 120;
        }
        if (+heightSize === 14) {
          heightSize = 200;
        }
        if (+heightSize === 21) {
          heightSize = 260;
        }
        if (+heightSize === 28 || +heightSize === 35 || +heightSize === 42 || +heightSize === 50) {
          heightSize = 285;
        }
        doc.addImage(img, 'JPEG', 5, 8, 200, +heightSize);
        doc.setPage(2);
        doc.internal.getNumberOfPages();
        var dateName = document.getElementById('dateSpan').innerHTML;
        doc.save(querySelector['location'] + ' ( ' + dateName + ' ) ' + '.pdf'); // file name pdf
      }
    });
  }

  function currency(x) { //js render day formate
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
  }

  function removeA(arr) {
    var what, a = arguments,
      L = a.length,
      ax;
    while (L > 1 && arr.length) {
      what = a[--L];
      while ((ax = arr.indexOf(what)) !== -1) {
        arr.splice(ax, 1);
      }
    }
    return arr;
  }

  function uniqBy(a, key) {
    var seen = {};
    return a.filter(function(item) {
      var k = key(item);
      return seen.hasOwnProperty(k) ? false : (seen[k] = true);
    })
  }


  function monthDiff(d1, d2) {
    var d1Y = d1.getFullYear();
    var d2Y = d2.getFullYear();
    var d1M = d1.getMonth();
    var d2M = d2.getMonth();
    if (+d2 == 2019) {
      return (d2M + 12 * d2Y) - (d1M + 12 * d1Y);
    }
    return (d2M + 12 * d2Y) - (d1M + 12 * d1Y);
  }

  function formateDay(val) {
    dayDate = new Date(val);
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    if (months[dayDate.getMonth()] === undefined || months[dayDate.getMonth()] === 'undefined') {
      return moment(val).format('MMM D, YYYY');
    } else {
      return dayDate.getDate() + "-" + months[dayDate.getMonth()] + "-" + dayDate.getFullYear().toString().substr(-2);
    }
  }

  function formateWeek(val1, val2) {
    return moment(val1).format('MMM D') + " - " + moment(val2).format('MMM D, YYYY');
  }

  function formateMonth(val) {
    var mydate = new Date(val);
    var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
      "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ][mydate.getMonth()];
    if (month === undefined || month === 'undefined') {
      return moment(val).format('MMM-YYYY');
    } else {
      return month + '-' + mydate.getFullYear();
    }
  }



  // Global Variables for chart.js
  var tooltipAmount = {
    label: function(t, d) {
      let xLabel = d.datasets[t.datasetIndex].label;
      let valRound = (+t.yLabel).toFixed(2);
      let yLabel = t.yLabel >= 1000 ? 'PKR ' + valRound.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : 'PKR ' + t.yLabel;
      return xLabel + ': ' + yLabel;
    }
  }

  var tooltipPerAmount = {
    label: function(t, d) {
      var sum = d.datasets.reduce((sum, dataset) => {
        return sum + dataset.data[t.index];
      }, 0);
      var percent = d.datasets[t.datasetIndex].data[t.index] / sum * 100;
      percent = percent.toFixed(2); // make a nice string

      var valRound = (+t.yLabel).toFixed(2);

      //Making Currency
      var yLabel = t.yLabel >= 1000 ? valRound.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : t.yLabel;
      return d.datasets[t.datasetIndex].label + ': ' + 'PKR ' + yLabel + ' ( ' + percent + '% )';

    }
  }

  var tooltipCount = {
    label: function(t, d) {
      var xLabel = d.datasets[t.datasetIndex].label;
      var yLabel = (+t.yLabel).toFixed(1);
      yLabel = yLabel >= 1000 ? yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : t.yLabel;
      return xLabel + ': ' + yLabel;
    }
  }
  var tooltipPerCount = {
    label: function(t, d) {
      var sum = d.datasets.reduce((sum, dataset) => {
        return sum + dataset.data[t.index];
      }, 0);
      var percent = d.datasets[t.datasetIndex].data[t.index] / sum * 100;
      percent = percent.toFixed(2); // make a nice string

      //Making Currency
      var yLabel = t.yLabel >= 1000 ? t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : t.yLabel;
      return d.datasets[t.datasetIndex].label + ': ' + yLabel + ' ( ' + percent + '% )';

    }
  }

  var tooltipPie = {
    label: function(t, d) {
      var label = Math.round(+d.datasets[0].data[t.index]);
      var xLabel = d.labels[t.index];
      var yLabel = label >= 1000 ? label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : label;
      return xLabel + ': ' + yLabel;
    },
    afterLabel: function(tooltipItem, data) {
      //get the concerned dataset
      var dataset = data.datasets[tooltipItem.datasetIndex];
      //calculate the total of this data set
      var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
        return previousValue + currentValue;
      });
      //get the current items value
      var currentValue = dataset.data[tooltipItem.index];
      //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
      var precentage = Math.floor(((currentValue / total) * 100) + 0.5);

      return data.datasets[tooltipItem.datasetIndex].label + ': ' + precentage + "%";
    }
  }


  var callBackCurency = {
    userCallback: function(value, index, values) {
      var x = value;
      x = x.toString();
      var afterPoint = '';
      if (x.indexOf('.') > 0)
        afterPoint = x.substring(x.indexOf('.'), x.length);
      x = Math.floor(x);
      x = x.toString();
      var lastThree = x.substring(x.length - 3);
      var otherNumbers = x.substring(0, x.length - 3);
      if (otherNumbers != '')
        lastThree = ',' + lastThree;
      value = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
      var value2 = value;
      if (Math.floor(value2) === value2) {
        value2 = 0;
      } else {
        valueLength = value2.toString().split(".");
      }
      if (valueLength[1] > 10)
        value = parseFloat(value).toFixed(1);
      return value;
    }
  };

  function locationChange(value) {
    if ($('#startDate').val().trim() == '' || $('#endDate').val().trim() == '') {
      window.location.href = value + "?startDate=" + querySelector['startDate'] + "&endDate=" + querySelector['endDate'];
    } else {
      var startDate = $('#startDate').val();
      var endDate = $('#endDate').val();
      window.location.href = value + '?startDate=' + startDate + '&endDate=' + endDate;
    }
  }

  function formatQuarter(val) {
    return moment(val).format('[Q]Q - Y');
  }

  function formatQuarterAcc(val) {
    return moment(val).format('[Q]Q - Y');
  }

  function formatYear(val) {
    return 'YEAR ' + moment(val).format('YYYY');
  }
</script>