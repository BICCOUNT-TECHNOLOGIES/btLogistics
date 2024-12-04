<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <style>
        /* General Styles */
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
 /* Sidebar Styles */
 .sidebar {
      width: 250px;
      background-color: #f8f9fa;
      position: fixed;
      top: 17%;
      left: 0;
      height: 100%;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar .add-material-btn {
      width: 100%;
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .sidebar .add-material-btn:hover {
      background-color: #0056b3;
    }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #199cb4;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .profile-section {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }

        .profile-image {
            flex: 1 1 150px;
            max-width: 200px;
            text-align: center;
            margin: 10px;
        }

        .profile-image img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid #ddd;
            object-fit: cover;
        }

        .profile-info {
            flex: 2 1 300px;
            margin: 10px;
        }

        .profile-info h2 {
            margin-top: 0;
            color: #333;
        }

        .profile-info p {
            margin: 8px 0;
            color: #666;
        }

        .profile-info a {
            color: #4CAF50;
            text-decoration: none;
        }

        .profile-info a:hover {
            text-decoration: underline;
        }

        .actions {
            padding: 20px;
            text-align: center;
            border-top: 1px solid #ddd;
        }

        .actions a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            background-color: #4CAF50;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .actions a:hover {
            background-color: #45a049;
        }

        .actions a.secondary {
            background-color: #f44336;
        }

        .actions a.secondary:hover {
            background-color: #e53935;
        }

       
    .header .logo img {
      height: 100px;
      width: 100px;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 5px 25px;
      background-color: #007FFF;
      color: white;
    }

    /* Logo Styles */
    .logo {
      margin-right: auto;
    }

    .logo img {
      max-height: 90px;
      margin-right: 20px;
    }

    /* Notification Icon Styles */
    .notification-icon {
      display: flex;
      align-items: center;
      margin-right: 20px;
    }

    .notification-icon .icon {
      font-size: 20px;
      margin-right: 5px;
    }

    .notification-icon .badge {
      background-color: red;
      color: white;
      padding: 2px 6px;
      border-radius: 50%;
      font-size: 12px;
    }

    /* Profile Styles */
    .profile {
      display: flex;
      align-items: center;
    }

    .profile-pic {
      border-radius: 50%;
      margin-right: 10px;
      height: 40px;
      width: 40px;
    }

    .profile-name {
      font-size: 16px;
    }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>User Profile</h1>
        </div>

        <!-- Profile Section -->
        <div class="profile-section">
            <!-- Profile Image -->
            <div class="profile-image">
                <img src="https://via.placeholder.com/150" alt="Profile Picture">
            </div>

            
            <!-- Profile Info -->
            <div class="profile-info">
                <h2>John Doe</h2>
                <p><strong>Email:</strong> johndoe@example.com</p>
                <p><strong>Phone:</strong> +123 456 7890</p>
                <p><strong>Location:</strong> New York, USA</p>
                <p><strong>About:</strong> A software engineer with a passion for building intuitive web applications.</p>
                <a href="#">View More Details</a>
            </div>
        </div>

        <!-- Actions Section -->
        <div class="actions">
            <a href="{{ route('manufacturer.edit')}}" class="edit">Edit Profile</a>
            <a href="{{route('manufacturer.delete')}}" class="secondary" id="deleteAccount">Delete Account</a>
        </div>
    </div>

    </div>

    <script>
        // Get elements
        const deleteButton = document.getElementById('deleteAccount');
        const overlay = document.getElementById('deleteOverlay');
        const confirmButton = document.getElementById('confirmDelete');
        const cancelButton = document.getElementById('cancelDelete');

        // Show overlay when delete button is clicked
        deleteButton.addEventListener('click', function() {
            overlay.style.display = 'flex';
        });

        // Hide overlay if cancel button is clicked
        cancelButton.addEventListener('click', function() {
            overlay.style.display = 'none';
        });

        // Submit the form when confirmed
        confirmButton.addEventListener('click', function() {
            // Assuming you want to navigate to the delete route for the user
            window.location.href = "{{ route('manufacturer.delete') }}"; // Redirect to delete page
        });
    </script>

</body>
</html>
