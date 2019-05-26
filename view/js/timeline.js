
	//side bar ###########################################################################
	$.get(baseURL + "/post/all"+"/"+100+"/"+1, function(data) {
		var concatActivity = '';
		for (var i = 0; i < 6 && i < data.row.length; i++) {
            let {created_at, image, name, title, description, id, file} = data.row[i];
			concatActivity += 
			'<div class="activity-box-w">'+
                '<div class="activity-time">'+ moment(created_at).fromNow() +'</div>'+
            
                
                '<div class="pipeline-item" style="width:100%; padding: 3%;">'+
                  '<div class="pi-body">'+
                    '<div class="avatar">'+
                      '<img alt="" src="./uploads/'+image+'">'+
                    '</div>'+
                    '<div class="pi-info">'+
                      '<div class="h6 pi-name">'+
                        name +
                      '</div>'+
                      '<div class="pi-sub">'+
                        (description).slice(0,256) + '... <a href="#" onclick=windowLocation('+id+') id="readMore">Read More</a>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<div class="pi-foot">'+
                    '<div class="tags">'+
                    '<a class="tag" href="./uploads/files/'+ file +'" download="'+ title +'">'+title+'</a>'+
                    '</div>'+
                    '<a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>0 Comments</span></a>'+
                    '<a class="extra-info" href="#"><i class="icon-like post-id-'+id+' clap-btn" ></i><span  onclick="allLikes('+id+')" id="post-id-'+id + '"  data-target="#likeModal" data-toggle="modal" > Likes</span></a>'+
                  '</div>'+
                '</div>'+

            '</div>';
            likeCount(id);
        }
        
        // activity boxes w ############################################################
		$(".activity-boxes-w").html(concatActivity);
        //clapp button #################################################################
        $('.clap-btn').on('click', function() {
            var that = $(this);
            var c = $(this).attr('class');
            var post_id = c.slice( c.indexOf("post-id-")+8 , c.indexOf("clap-btn")  );
            console.log( $(this).hasClass('clap-active') )
            
            // ajax post to add and delete likes in table
            $.ajax({
                url: "/maju/view/php/like.php",
                type: "POST",
                data: {
                    'post_id': post_id,
                    'like': $(this).hasClass('clap-active')
                },
                success: function(data) {
                    if(data == 'inserted' ){
                        that.addClass('clap-active');
                    }if(data == 'deleted'){
                        that.removeClass('clap-active');
                    }
                    likeCount(post_id);
                },
                error: function(e) {
                    alert('error');
                }
            });
        });
    }).then(function( data ) {
        // after fetch request
        $('.file').css({'top':'calc(50% + 15px)','opacity':1});
    });
