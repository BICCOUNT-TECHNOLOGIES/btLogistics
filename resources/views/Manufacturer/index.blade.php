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

  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <button class="add-material-btn" onclick="showUploadContainer()">Add Material</button>
  </div>

  <!-- Header -->
  <header class="header">
    <div class="notification-icon">
      <span class="icon">🔔</span>
      <span class="badge">3</span>
    </div>
    <div class="profile">
      <img src="https://via.placeholder.com/40" alt="Profile Picture" class="profile-pic">
      <span class="profile-name">{{ Auth::user()->name }}!</span>
    </div>
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
