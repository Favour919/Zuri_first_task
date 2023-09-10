<?php
// Get the query parameters
$slackName = isset($_GET['slack_name']) ? $_GET['slack_name'] : 'Favour Bassey';
$track = isset($_GET['track']) ? $_GET['track'] : 'Backend';

// Get the current day of the week
$currentDayOfWeek = date('l');

// Get the current UTC time
$currentUtcTime = gmdate('Y-m-d H:i:s');

// Validate the UTC time to be within +/-2 hours
$currentTime = strtotime($currentUtcTime);
$twoHoursAgo = strtotime('-2 hours');
$twoHoursLater = strtotime('+2 hours');

if ($currentTime < $twoHoursAgo || $currentTime > $twoHoursLater) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "UTC time is not within +/-2 hours"]);
    exit;
}

// GitHub URL of the file being run
$githubFileUrl = 'https://github.com/Favour919/Zuri_first_task/blob/main/get_info.php';

// GitHub URL of the full source code
$githubSourceCodeUrl = 'https://github.com/Favour919/Zuri_first_task';

// Response JSON
$response = [
    "slack_name" => $slackName,
    "current_day_of_week" => $currentDayOfWeek,
    "current_utc_time" => $currentUtcTime,
    "track" => $track,
    "github_file_url" => $githubFileUrl,
    "github_source_code_url" => $githubSourceCodeUrl,
];

// Send a success response
http_response_code(200); // OK
header('Content-Type: application/json');
echo json_encode($response);
?>
