<script>
    function likeCount(post_id){
        $.get(baseURL + "/like/"+post_id, function(data) {
            // check by session id will be #####################
            $('#post-id-'+post_id).html(`<b> ${data.row.length} </b> LIKE`);
            for( let i = 0; i < data.row.length; i++ ){
                if( data.row[i].user_id == <?php echo $_SESSION['user_id'] ?> ){
                    $('.post-id-'+post_id).addClass('clap-active');
                }
            }
        });
    }
    function allLikes(post_id){
        $.get(baseURL + "/like/"+post_id, function(data) {
            var concatString = ''
            // check by session id will be #####################
            for( let i = 0; i < data.row.length; i++ ){
                concatString += `<div class="likes-container" > <img src="./uploads/${data.row[i].image}" width="10%" alt="" /> <a href="javascript:void(0)"> ${data.row[i].name} </a> <span>${moment(data.row[i].created_at).fromNow()}</span> <hr> </div>`;
            }
            $('#likeModalBody').html(concatString);
        });
    }
    function windowLocation(id){
        window.location = `post.php?postId=${id}`;
    }
    function fillComment(name){
        $('#comment_content').val(`<b>${name}</b>`);
    }
</script>