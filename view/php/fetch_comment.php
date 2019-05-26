<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=maju_pms', 'root', '');

$query = "
    SELECT 
        c.*
        ,( SELECT u.`name` FROM `user` u WHERE u.`id` = c.`user_id`) AS name
        ,( SELECT u.`image` FROM `user` u WHERE u.`id` = c.`user_id`) AS image 
    FROM comment c 
    WHERE parent_comment_id = '0' 
    ORDER BY id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach ($result as $row) {
    $output .= '<div class="chat-message">
                    <div class="chat-message-content-w">
                        <div class="chat-message-content">' . $row["comment"] . '</div>
                    </div>
                    <div class="chat-message-avatar"><img title="' . $row["name"] . '" alt="" src="./uploads/' . $row["image"] . '"></div>
                    <div class="chat-message-date">' . $row["created_at"] . '</div>
                    <div style="
                    display: inline-flex;
                    float: right;
                "><a href="#comment_content" class="btn btn-default reply" onclick="fillComment(`' . $row["name"] . '`)" ><i class="fa fa-reply" aria-hidden="true"></i></a></div>
                </div>
                ';
                
    $output .= get_reply_comment($connect, $row["id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
    $query = "
            SELECT c.*        
            ,( SELECT u.`name` FROM `user` u WHERE u.`id` = c.`user_id`) AS name
            ,( SELECT u.`image` FROM `user` u WHERE u.`id` = c.`user_id`) AS image 
            FROM comment WHERE c.parent_comment_id = '" . $parent_id . "'";
    $output = '';
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $count = $statement->rowCount();
    if ($parent_id == 0) {
        $marginleft = 0;
    } else {
        $marginleft = $marginleft + 48;
    }
    if ($count > 0) {
        foreach ($result as $row) {
            $output .= '
                        <div class="chat-message"  style="margin-left:' . $marginleft . 'px">
                            <div class="chat-message-content-w">
                                <div class="chat-message-content">' . $row["comment"] . '</div>
                            </div>
                            <div class="chat-message-avatar"><img title="' . $row["name"] . '" alt="" src="./uploads/' . $row["image"] . '"></div>
                            <div class="chat-message-date">' . $row["created_at"] . '</div>
                        </div>
                        ';
            $output .= get_reply_comment($connect, $row["id"], $marginleft);
        }
    }
    return $output;
}
