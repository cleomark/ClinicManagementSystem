<!DOCTYPE html>

<html>
<head>
    <title>Send SMS</title>
</head>
<body>
    <form method="POST">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Send SMS">
    </form>

    <?php
    /**
     * Send an SMS message directly by calling HTTP endpoint.
     *
     * For your convenience, environment variables are already pre-populated with your account data
     * like authentication, base URL, and phone number.
     *
     * Please find detailed information in the readme file.
     */
    session_start();
    include '../../db.php';
    require '../../vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\RequestOptions;

    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $phoneNumber = $_POST['phone'];
        $message = $_POST['message'];

        $client = new Client([
            'base_uri' => "https://2kw6nm.api.infobip.com/",
            'headers' => [
                'Authorization' => "App 47d7c2b8394b7802f3eb4e49f8da3a40-aee5ec9a-6fae-4e23-b89f-246ee2b98f4a",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);

        $response = $client->request(
            'POST',
            'sms/2/text/advanced',
            [
                RequestOptions::JSON => [
                    'messages' => [
                        [
                            'from' => 'Clinic',
                            'destinations' => [
                                ['to' => $phoneNumber]
                            ],
                            'text' => $message,
                        ]
                    ]
                ],
            ]
        );

        echo("<p>HTTP code: " . $response->getStatusCode() . "</p>");
        echo("<p>Response body: " . $response->getBody()->getContents() . "</p>");
    }
    ?>
</body>
</html>
