<?php
// Get the Slack name and track from GET parameters
$slack_name = isset($_GET['slack_name']) ? $_GET['slack_name'] : '';
$track = isset($_GET['track']) ? $_GET['track'] : '';

if(empty($slack_name)|| empty($track)){
    echo "please insert the get parameters";
}else{ 
// Set the current day of the week
$current_day =  Date('l');

// Set the current UTC time with validation of +/-2 minutes
$utc_time = Date('Y-m-d\TH:i:s\Z');

// Set the GitHub URL of the file being run
$github_file_url = 'https://github.com/Favour919/Zuri_first_task/api.php';

// Get the GitHub URL of the full source code
$github_repo_url = 'https://github.com/Favour919/Zuri_first_task/blob/main/api.php';

// Associative array to hold the data
$response_data = [
    'slack_name' => $slack_name,
    'current_day' => $current_day,
    'utc_time' => $utc_time,
    'track' => $track,
    'github_file_url' => $github_file_url,
    'github_repo_url' => $github_repo_url,
    'status_code' => 200
];

// Convert the data to JSON format
$encoded_data = json_encode($response_data, JSON_PRETTY_PRINT);

// Set the response headers to indicate JSON content
header('Content-Type: application/json');


// Output the JSON data
echo $encoded_data;
}
?>
