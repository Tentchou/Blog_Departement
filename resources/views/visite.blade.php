<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Counter</title>
    <style>
        .progress-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: conic-gradient(#4caf50 {{ $percentage }}%, #d3d3d3 0%);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div style="text-align:center; margin-top:50px;">
        <h1>Total Visitors: {{ $totalVisitors }}</h1>
        <div class="progress-circle">
            {{ number_format($percentage, 2) }}%
        </div>
    </div>
</body>
</html>
