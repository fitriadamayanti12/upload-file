<?php

function getRegisteredAPI() {
    return ["abcdy8kh6j4", "de4fgk9h4v", "cd3gtz8h4c"];
}

function isInputValid($inputs) {
    $apiKey = $inputs["api_key"];
    if(in_array($apiKey, getRegisteredAPI())) {
        return true;
    } else {
        return false;
    }
}

function jsonOutput($status, $message, $data) {
    $response = ["status" => $status, "message" => $message, "data" => $data];
    header("Content-type: application/json");
    echo json_encode($response);
}

function getNewsData() {
    $news = [
    ["title" => "Headline news", "content" => "Good morning everyone", "writter" => "Fitria Damayanti"], ["title" => "Top news", "content" => "Good night everyone", "writter" => "Lisa Aulia"], ["title" => "Good news", "content" => "Good evening everyone", "writter" => "Fatih el Zhafran"]
    ];

    return $news;
}

// check input
if (isInputValid($_GET)) {
    jsonOutput("success", "Successfully get news data!", getNewsData());
} else {
    jsonOutput("fail", "Invalid api key!", null);
}