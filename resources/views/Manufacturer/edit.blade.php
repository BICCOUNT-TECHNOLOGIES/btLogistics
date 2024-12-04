
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        header .logo img {
            width: 60px;
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        .profile-form {
            display: grid;
            grid-gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        input, textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            width: 100%;
        }

        textarea {
            height: 100px;
        }

        input[type="file"] {
            padding: 0;
        }

        .password-section {
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .save {
            background-color: #4CAF50;
            color: white;
        }

        .save:hover {
            background-color: #45a049;
        }

        .cancel {
            background-color: #f44336;
            color: white;
        }

        .cancel:hover {
            background-color: #e53935;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }

        footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
            </div>
            <h1>Update Profile</h1>
        </header>

        <form class="profile-form" enctype="multipart/form-data">
            <!-- Profile Picture Section -->
            <div class="profile-picture">
                <label for="profile-picture">Profile Picture</label>
                <input type="file" id="profile-picture" name="profile-picture[]">
            </div>

            <!-- Personal Information Section -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
            </div>

            {{-- <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Enter your location">
            </div> --}}

            <!-- Password Section -->
            <div class="password-section">
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" id="current-password" name="current-password" placeholder="Enter your current password">
                </div>

                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" id="new-password" name="new-password" placeholder="Enter new password">
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm New Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password">
                </div>
            </div>
            <!-- Action Buttons -->
            <div class="form-actions">
                <button type="submit" class="btn save">Save Changes</button>
                <button type="button" class="btn cancel">Cancel</button>
            </div>
        </form>

        <footer>
            <p>&copy; 2024 Your Company | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </footer>
    </div>
'
</body>
</html>
