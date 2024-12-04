<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account - {{}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .header {
            background-color: #f44336;
            color: white;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .message {
            margin: 20px 0;
            font-size: 18px;
            color: #333;
        }

        .actions a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            background-color: #f44336;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .actions a:hover {
            background-color: #e53935;
        }

        .actions form {
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Delete Account</h1>
    </div>

    <div class="message">
        <p>Are you sure you want to delete your account, {{ $user->name }}?</p>
        <p>This action is permanent and cannot be undone.</p>
    </div>

    <div class="actions">
        <!-- Form to delete the user account -->
        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <!-- Delete button with id for JS targeting -->
            <button type="button" id="deleteButton" style="background-color: #e53935; color: white;">Yes, Delete My Account</button>

        </form>

        <!-- Cancel link to return to the profile page -->
        <a href="{{ route('manufacturer.profile', $user->id) }}" style="background-color: #4CAF50;">Cancel</a>
    </div>
</div>


<script>
    // JavaScript function for the confirmation alert
    function confirmDelete(event) {
        // Display a confirmation dialog
        if (confirm("Are you sure you want to delete your account? This action is permanent and cannot be undone.")) {
            // If the user clicks "OK", submit the form
            event.target.closest('form').submit(); // Submitting the form
        } else {
            // If the user clicks "Cancel", prevent the form submission
            event.preventDefault();
        }
    }

    // Trigger the confirmDelete function when the delete button is clicked
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButton = document.getElementById('deleteButton');
        if (deleteButton) {
            deleteButton.addEventListener('click', function (event) {
                // Call the confirmDelete function on click
                confirmDelete(event);
            });
        }
    });
</script>
</body>
</html>
