<?php 

##chatgpt kısmı##
function requestOpenAi($url, $js = '') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if (!empty($js)) { 
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $js);
    }

    $headers = array();
    $headers[] = 'Authorization: Bearer CHATGPT-API-KEY-GELECEK';
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch));
    }

    curl_close($ch);
    $result = json_decode($result);
    return $result;
}

function getOpenAiText($text, $count){
    $url = 'https://api.openai.com/v1/chat/completions';

    // PHP array for request body
    $data = [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            [
                'role' => 'user',
                'content' => $text
            ]
        ],
        'max_tokens' => $count
    ];

    // Convert the PHP array to a JSON string
    $js = json_encode($data);

    // Send request
    $result = requestOpenAi($url, $js);
    return $result;
}


?>