<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Button</title>
    <style>
        .logout-form {
            display: inline-block;
            margin: 0;
        }

        .logout-button {
            background: linear-gradient(90deg, #007bff, #0056b3); /* Blue gradient */
            color: white;
            border: none;
            width: 60px; /* Set equal width and height */
            height: 60px;
            border-radius: 50%; /* Make it circular */
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logout-button:hover {
            background: linear-gradient(90deg, #0056b3, #003f80); /* Darker blue */
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
            transform: scale(1.1); /* Slightly bigger on hover */
        }
    </style>
</head>
<body>
    <form action="/logout" method="POST" class="logout-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="logout-button" title="Logout">
            🚪 <!-- Logout icon (can replace with text) -->
        </button>
    </form>
</body>
</html>
