<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .email-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }
        .email-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }
        .email-body {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 0 0 8px 8px;
            border: 1px solid #dee2e6;
        }
        .email-footer {
            padding: 15px;
            background-color: #f1f1f1;
            border-radius: 0 0 8px 8px;
            text-align: center;
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="email-container">
            <div class="email-header">
                <h4 class="mb-0">New Contact Message Received</h4>
            </div>
            <div class="email-body">
                <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
                <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
                <p><strong>Message:</strong></p>
                <p>{{ $contactMessage->message }}</p>
            </div>
            <div class="email-footer">
                <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
