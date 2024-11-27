<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="manufacturer/styles.css">
  <title>Murram Road Division</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
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

    /* Header Styles */
    .header {
      padding: 50px;
      background-color: #007FFF;
      color: white;
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }

    /* Modal/Overlay Styles */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .uploadContainer {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      width: 50%;
      max-width: 600px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .close-overlay {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;
      position: absolute;
      top: 10px;
      right: 10px;
    }

    .close-overlay:hover {
      background-color: #c82333;
    }

    .upload-section {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 20px;
      justify-content: center;
    }

    .upload-item {
      width: 150px;
      height: 150px;
      border: 2px dashed #007bff;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      cursor: pointer;
      background-color: #f8f9fa;
    }

    .upload-item img {
      max-width: 100%;
      max-height: 100%;
      object-fit: cover;
    }

    .upload-item .close {
      position: absolute;
      top: 5px;
      right: 5px;
      background: red;
      color: white;
      padding: 5px;
      border-radius: 50%;
      cursor: pointer;
    }
    .header .logo img {
    height: 100px;
    width: 100px;
  }

  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 5px 25px; /* Adds padding to the header */
    background-color: #007FFF;
    color: white;
  }

  /* Logo Styles */
  .logo {
    margin-right: auto; /* Pushes the other elements to the right */
  }

  .logo img {
    max-height: 90px; /* Restrict logo height */
    margin-right: 20px; /* Add some space to the right of the logo */
  }

  /* Notification Icon Styles */
  .notification-icon {
    display: flex;
    align-items: center;
    margin-right: 20px; /* Add some space to the right */
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
    margin-right: 10px; /* Adds space between the profile image and name */
    height: 40px;
    width: 40px;
  }

  .profile-name {
    font-size: 16px;
  }




  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">

  

    <button class="add-material-btn" onclick="showUploadContainer()">Add Material</button>
  </div>

  <!-- Header -->
  <header class="header">
    
    <div class="logo">
      <img src="{{ asset('storage/images/logo.png') }}" alt="BICCOUNT GROUP Logo" />
    </div>

    <div class="notification-icon">
      <span class="icon">🔔</span>
      <span class="badge">3</span>
    </div>


    <div class="profile">
      <img src="https://via.placeholder.com/40" alt="Profile Picture" class="profile-pic">
      <span class="profile-name">{{Auth::user() ->name}}!</span>

  </header>




  <!-- Overlay -->
  <div class="overlay" id="overlay">
    <div class="uploadContainer">
      <button class="close-overlay" onclick="hideUploadContainer()">X</button>
      <h2>Upload Image with Description & Price</h2>
      <form id="image-upload-form" onsubmit="submitForm(event)">
        <!-- Description Field -->
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" placeholder="Enter description" required>
        </div>

        <!-- Price Field -->
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" id="price" placeholder="Enter price" required>
        </div>

        <!-- Image Upload Section -->
        <div class="upload-section" id="upload-section">
          <div class="upload-item" id="upload-item-1" onclick="triggerFileInput(1)">
            <input type="file" id="image1" accept="image/*" onchange="previewImage(event, 1)" style="display: none;">
            <span class="icon">+</span>
          </div>
        </div>

        <!-- Add Image Button -->
        <button type="button" class="btn btn-primary" onclick="addImageSlot()">Add Image</button>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>

  <script>
    // Show the overlay
    function showUploadContainer() {
      document.getElementById('overlay').style.display = 'flex';
    }

    // Hide the overlay
    function hideUploadContainer() {
      document.getElementById('overlay').style.display = 'none';
    }

    // Trigger the file input
    function triggerFileInput(id) {
      document.getElementById(`image${id}`).click();
    }

    let imageCount = 1;  // Initial image slot count

  function triggerFileInput(id) {
    document.getElementById(`image${id}`).click();  // Trigger the file input when clicking on the upload box
  }

  function previewImage(event, id) {
    const file = event.target.files[0];
    const uploadItem = document.getElementById(`upload-item-${id}`);

    // Clear any previous content in the upload item
    uploadItem.innerHTML = '';

    // Create the image preview element
    const imagePreview = document.createElement('img');
    const reader = new FileReader();
    reader.onload = function(e) {
      imagePreview.src = e.target.result;
      uploadItem.appendChild(imagePreview);

      // Create and append the "X" close button
      const closeButton = document.createElement('span');
      closeButton.classList.add('close');
      closeButton.textContent = 'X';
      closeButton.onclick = function() {
        removeImage(uploadItem, id);
      };
      uploadItem.appendChild(closeButton);
    };
    reader.readAsDataURL(file);
  }

  function removeImage(uploadItem, id) {
    // Remove the upload item (entire box)
    uploadItem.remove();
  }

  function addImageSlot() {
    imageCount++; // Increment image count
    const uploadSection = document.getElementById('upload-section');

    // Create a new upload item
    const newUploadItem = document.createElement('div');
    newUploadItem.classList.add('upload-item');
    newUploadItem.setAttribute('id', `upload-item-${imageCount}`);
    newUploadItem.setAttribute('onclick', `triggerFileInput(${imageCount})`);

    // Create input for the new upload item
    const input = document.createElement('input');
    input.type = 'file';
    input.id = `image${imageCount}`;
    input.accept = 'image/*';
    input.setAttribute('onchange', `previewImage(event, ${imageCount})`);

    // Create icon for the new upload item
    const icon = document.createElement('span');
    icon.classList.add('icon');
    icon.innerText = '+';

    // Append input and icon to the new upload item
    newUploadItem.appendChild(input);
    newUploadItem.appendChild(icon);

    // Append new upload item to the section
    uploadSection.appendChild(newUploadItem);
  }

  function submitForm(event) {
    event.preventDefault();

    const description = document.getElementById('description').value;
    const price = document.getElementById('price').value;

    if (!description || !price) {
      alert('Please fill in all fields');
      return;
    }

    alert(`Description: ${description}, Price: ${price}, Images Uploaded!`);
    // You can submit form data via AJAX here to your server or handle it accordingly
  }

  </script>
</body>
</html>
