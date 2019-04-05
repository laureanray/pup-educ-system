<?php

include(dirname(__FILE__) . "/../core/functions.php");

$announcements = getAllAnnouncements();
$announcements_json = json_decode($announcements, true);
$announcement_array = $announcements_json['data'];
// var_dump($announcements_json['data'][0]['author_id'])


// print($announcement_array[0]['last_name'])
foreach ($announcement_array as $an) {
    echo "
    <div class='card'>
    <div class='card-body text-left'>
        <h5 class='card-title text-primary display-1'>" . $an['title'] . "</h5>
        <h6 class='card-subtitle mb-2 text-muted'>Posted " . $an['updated'] . " by " . $an['first_name']  . "</h6>
        <p class='card-text'>
        "
        . $an['content'] .
        "</p>

    </div>
</div>
    ";
}
