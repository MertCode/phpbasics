<?php

class CohereNewsSummary
{
    private $apiKey;
    private $prompt;

    public function __construct($apiKey, $prompt)
    {
        $this->apiKey = $apiKey;
        $this->prompt = $prompt;
    }

    public function generateSummary()
    {
        $data = [
            'model' => 'command',
            'message' => $this->prompt,
            'temperature' => 0.3,
            // Additional configuration options can be added here
        ];

        $ch = curl_init('https://api.cohere.ai/v1/chat');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json'
        ));

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode == 200) {
            $data = json_decode($response, true);
            if (isset($data['text'])) {
                return "<p>$data[text]</p>";
            } else {
                return "<p>Could not extract news summary from response</p>";
            }
        } else {
            return "<p>API request failed with code: $httpcode</p>";
        }
    }
}

// Usage
$apiKey = 'D1hdwjZ6EJ2g3zNHWtyUB06RsqyKp3XCs4PfIxgv'; // Replace with your Cohere API Key
$prompt = "Summarize the most significant world news events from today"; // Your prompt for news summary

$cohereNewsSummary = new CohereNewsSummary($apiKey, $prompt);
echo $cohereNewsSummary->generateSummary();
