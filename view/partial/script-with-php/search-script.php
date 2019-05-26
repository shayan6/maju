<script>
  $(function() {

    // date range #############################################################################
    var start = moment();
    var end = moment();

    function cb(start, end) {

      //span start date **********************************************************
      $('#startDate span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
      ProcessOnChange();
    }

    $('#startDate').daterangepicker({
      showDropdowns: true,
      startDate: start,
      endDate: end,
      opens: 'left',
      minDate: '01/01/2018',
      maxDate: moment().format('MM/DD/YYYY'),
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment()],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'Last 2 Months': [moment().subtract(2, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'Last 3 Months': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'All Time': [new Date('01/25/2018'), moment()],
      }
    }, cb);

    // like range slider ##############################################################
    $.get(baseURL + "/selectAll/likes", function(data) {
      //range selector js ************************************************************* 
      $("#userLikes").ionRangeSlider({
        hide_min_max: true,
        keyboard: true,
        min: 0,
        max: +data.row[data.row.length - 1].c,
        from: 0,
        to: +data.row[data.row.length - 1].c,
        type: 'double',
        step: 1,
        prefix: "Like ",
        grid: true,
        onFinish: function(data) {
          // $('#filter-loader').show();
          ProcessOnChange();
        }
      });

    }).then(function(data) {
        //calender whcich will also call process on change
        cb(start, end);
    });
  });

  // post filter process on change##########################################################
  function ProcessOnChange() {

    var datePick = $('#startDate span').text();
    var index = datePick.indexOf("-"); // Gets the first index where a space occours
    var startDate = moment(new Date(datePick.substr(0, index))).format('YYYY-MM-DD 00:00:00'); // Gets the first part
    var endDate = moment(new Date(datePick.substr(index + 1))).format('YYYY-MM-DD 23:59:59'); // Gets the text part

    // search content url #################################################################
    var range = $('#userLikes').data("ionRangeSlider");
    var fromLike = range.result.from;
    var toLike = range.result.to;


    var searchPost = $('#user_post').val().trim();
    searchPost = searchPost == '' ? false : searchPost;

    //search post #########################################################################
    $.get(baseURL + "/userPostSearch/" + startDate + "/" + endDate + "/" + fromLike + "/" + toLike + "/" + searchPost, function(data) {

      var concatActivity = '';
      for (var i = 0; i < data.row.length; i++) {
        let {created_at, image, name, title, description, id, likes,comments} = data.row[i];
        concatActivity += 
              '<div class="col-12 col-sm-6">'+
                '<div class="pipeline-item">'+
                  '<div class="pi-body">'+
                    '<div class="avatar">'+
                      '<img alt="" src="./uploads/'+image+'">'+
                    '</div>'+
                    '<div class="pi-info">'+
                      '<div class="h6 pi-name">'+
                        name +
                      '</div>'+
                      '<div class="pi-sub">'+
                        (description).slice(0,256) + '...' +
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<div class="pi-foot">'+
                    '<div class="tags">'+
                      '<a class="tag" href="#"  onclick=windowLocation('+id+')>Read More</a>'+
                    '</div>'+
                    '<a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>'+comments+'Comments</span></a>'+
                    '<a class="extra-info" href="#"><i class="icon-like"></i><span>'+likes+' Likes</span></a>'+
                  '</div>'+
                '</div>'+
              '</div>';
      }
      $("#searchPost").html(concatActivity);

    });

  }
</script>