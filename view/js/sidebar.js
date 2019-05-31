
$.get(baseURL + "/selectAll/postRecent" , function (data) {
    var concatString = '';
    for (var i = 0; i < 6 && i < data.row.length; i++) {
        let {
            id,
            post_by,
            numbers_of_likes,
            post_time,
            title,
            image
        } = data.row[i];
        concatString += `<div class="profile-tile">
                            <div class="profile-tile-box">
                                <div class="pt-avatar-w">
                                <img alt="" src="./uploads/${image}">
                                </div>
                                <div class="pt-user-name">
                                ${post_by}
                                </div>
                            </div>
                            <div class="profile-tile-meta">
                                <ul>
                                <li>
                                    Post Time:<strong>${moment(post_time).fromNow()}</strong>
                                </li>
                                <li>
                                    Title:<strong>${title}</strong>
                                </li>
                                <li>
                                    Likes:<strong>${numbers_of_likes}</strong>
                                </li>
                                </ul>
                                <div class="pt-btn">
                                <a class="btn btn-success btn-sm" href="#" onclick="windowLocation(${id})">View Post</a>
                                </div>
                            </div>
                            </div>`;
    }
    $('#recentPost').html(concatString);
});