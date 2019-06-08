
//side bar ###########################################################################
function processOnChange(pageNo) {
  $.get(baseURL + "/post/all" + "/" + 3 + "/" + pageNo, function (data) {
    var concatActivity = '';
    for (var i = 0; i < 6 && i < data.row.length; i++) {
      let { created_at, image, name, title, description, id, file } = data.row[i];
      concatActivity +=
        '<div class="activity-box-w">' +
        '<div class="activity-time">' + moment(created_at).fromNow() + '</div>' +


        '<div class="pipeline-item" style="width:100%; padding: 3%;">' +
        '<div class="pi-body">' +
        '<div class="avatar">' +
        '<img alt="" src="./uploads/' + image + '">' +
        '</div>' +
        '<div class="pi-info">' +
        '<div class="h6 pi-name">' +
        name +
        '</div>' +
        '<div class="pi-sub">' +
        (description).slice(0, 256) + '... <a href="javascript:void(0)" onclick=windowLocation(' + id + ') id="readMore">Read More</a>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<div class="pi-foot">' +
        '<div class="tags">' +
        '<a class="tag" href="./uploads/files/' + file + '" download="' + title + '">' + title + '</a>' +
        '</div>' +
        '<a class="extra-info" href="javascript:void(0)"   onclick=windowLocation(' + id + ') ><i class="os-icon os-icon-mail-12"></i><span>0 Comments</span></a>' +
        '<a class="extra-info" href="javascript:void(0)"><i class="icon-like post-id-' + id + ' clap-btn" onclick="toggleLike('+ id +')" ></i><span  onclick="allLikes(' + id + ')" id="post-id-' + id + '"  data-target="#likeModal" data-toggle="modal" > Likes</span></a>' +
        '</div>' +
        '</div>' +

        '</div>';
      likeCount(id);
    }

    // activity boxes w ############################################################
    $(".activity-boxes-w").append(concatActivity);
    
  }).then(function (data) {
    // after fetch request
    $('.file').css({ 'top': 'calc(50% + 15px)', 'opacity': 1 });
    $('#readMoreTimeLine').attr('onclick', `processOnChange(${pageNo + 1})`);
  });

}
processOnChange(1);

function toggleLike(id){
  // ajax post to add and delete likes in table
  $.ajax({
    url: "/maju/view/php/like.php",
    type: "POST",
    data: {
      'post_id': id,
      'like': $('.post-id-'+id).hasClass('clap-active')
    },
    success: function (data) {
      if (data == 'inserted') {
        $('.post-id-'+id).addClass('clap-active');
      } if (data == 'deleted') {
        $('.post-id-'+id).removeClass('clap-active');
      }
      likeCount(id);
    },
    error: function (e) {
      alert('error');
    }
  });
}