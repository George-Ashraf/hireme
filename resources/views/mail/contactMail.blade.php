<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        h4 {
            color: #555;
            margin: 8px 0;
        }
        .message-body {
            background-color: #eaeaea;
            padding: 15px;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #aaa;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>New Message</h2>

    <h4><strong>Email:</strong> {{ $data['email'] }}</h4>
    <h4><strong>Name:</strong> {{ $data['name'] }}</h4>
    <h4><strong>Profession:</strong> {{ $data['profession'] }}</h4>

    <h4><strong>Message:</strong></h4>
    <div class="message-body">
        <p>{{ $data['message'] }}</p>
    </div>

    <div class="footer">
        <p>Thank you for reaching out to us!</p>
    </div>
</div>

</body>
</html>
