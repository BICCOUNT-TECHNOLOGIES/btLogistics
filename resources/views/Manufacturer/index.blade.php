<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('styles.css') }}">
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


/* side bar styles */

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
      position: relative;
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
      position: sticky;
      width: 100%;
      top: 0;
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

    /* Multiple Image Preview Styles */
    #multiple-image-preview-container {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 10px;
      justify-content: center;
    }

    .image-preview-wrapper {
      position: relative;
      margin: 5px;
      text-align: center;
    }

    .image-preview-wrapper img {
      max-width: 150px;
      max-height: 150px;
      object-fit: cover;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .remove-image {
      position: absolute;
      top: 5px;
      right: 5px;
      background: rgba(255,0,0,0.7);
      color: white;
      border: none;
      border-radius: 50%;
      width: 25px;
      height: 25px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }
    .add-image-btn {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      margin-left: 10px;
      cursor: pointer;
    }

    .add-image-btn:hover {
      background-color: #218838;
    }

    .image-upload-actions {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 15px;
    }

      /* Logout Button Styles */
      .logout-btn {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 60px;
        border: none;
        border-radius: 50%;
        background-color: #dc3545;
        color: white;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    .logout-btn:hover {
        background-color: #c82333;
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        transform: translateX(-50%) scale(1.1);
    }

  </style>
</head>
<body>

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


  <!-- Sidebar -->
  <div class="sidebar">
    <button class="add-material-btn" onclick="showUploadContainer()">Add Material</button>

    {{-- !-- Circular Logout Button --> --}}

    <a href="{{ route('logout') }}">LOGOUT</a>
        <button class="logout-btn" title="Logout">
            LOGOUT
        </button>
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

       <img src="{{ asset('storage/' . $profile_picture) }}" alt="Profile Picture" class="img-fluid">
      
      {{-- <span class="profile-name">{{Auth::user()->name}}</span> --}}
     <span class="profile-name"> <a href="{{route('profile')}}">{{Auth::user()->name}}</a> </span>

      
    </div>
  </header>

  
{{-- Material display section --}}


@isset($materials)
@if($materials->isEmpty())
    <p>No materials available.</p>
@else
    @foreach($materials as $material)
        <div class="product-container">
            <div class="product-image">
                <!-- Main Image -->
                @if($material->images->isNotEmpty()) <!-- Check if there are any images -->
                    <img 
                        class="mainImage"
                        data-material-id="{{ $material->id }}" 
                        src="{{ asset('storage/' . $material->images->first()->imagepath) }}" 
                        alt="Main image for {{ $material->name }}" 
                    />

                    <div class="image-thumbnails">
                        @foreach($material->images as $image)
                            <img 
                                class="thumbnail" 
                                src="{{ asset('storage/' . $image->imagepath) }}" 
                                alt="Thumbnail for {{ $material->name }}" 
                                onclick="changeImage('{{ $image->imagepath }}', {{ $material->id }})"
                            />
                        @endforeach
                    </div>
                @else
                    <p>No images available for {{ $material->name }}</p>
                @endif    
            </div>

            <div class="product-info">
                <h1>{{ $material->name }}</h1>
                <p class="description">{{ $material->description }}</p>
                <div class="rating">
                    <span class="stars">★★★★☆</span>
                    <span class="reviews">(72 Customer reviews)</span>
                </div>

                <div class="price">
                    <span class="discounted-price"> KSH {{ $material->price }}</span>
                    {{-- <span class="original-price">KSh 2,999</span>
                    <span class="discount">87% off</span> --}}
                </div> 

                {{-- <div class="flash-sale">
                    <span>Flash Sales</span>
                    <span class="timer">Closing in <span id="countdown"></span></span>
                </div> --}}

                <div class="color">
                    <label for="color">Color:</label>
                    <select id="color">
                        <option value="brown">Brown</option>
                    </select>
                </div>

                <div class="quantity">
                  <b>
                  <span class="discounted-price"> Quantity </span>
                  <span class="discounted-price"> 1 Tonne</span>
                </b>
              </div>


                <div class="delivery-info">
                    <p>Ships from <strong>NAIROBI</strong>, arrives at <strong> YOUR DESIRED DESTINATION</strong> within 24hrs</p>
                </div>
            </div>
        </div>
        <br>
    @endforeach
@endif
@endisset

<script>
    // Countdown Timer
    const countdownElement = document.getElementById('countdown');
    const countdownEnd = new Date().getTime() + 15 * 60 * 1000; // 15 minutes countdown

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = countdownEnd - now;

        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownElement.innerHTML = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

        if (distance < 0) {
            clearInterval(timerInterval);
            countdownElement.innerHTML = "EXPIRED";
        }
    }

    const timerInterval = setInterval(updateCountdown, 1000);

    // Change Main Image on Thumbnail Click
    function changeImage(imagePath, materialId) {
        // Find the main image of the specific material
        const mainImage = document.querySelector(`.mainImage[data-material-id='${materialId}']`);
        mainImage.src = `/storage/${imagePath}`;

        // Remove 'main-thumbnail' class from all thumbnails of this material
        const thumbnails = mainImage.closest('.product-container').querySelectorAll('.thumbnail');
        thumbnails.forEach(thumb => thumb.classList.remove('main-thumbnail'));

        // Highlight the selected thumbnail
        const activeThumbnail = Array.from(thumbnails).find(thumb => thumb.src.includes(imagePath));
        if (activeThumbnail) activeThumbnail.classList.add('main-thumbnail');
    }
</script>

  <!-- Overlay -->
  <div class="overlay" id="overlay">
    <div class="uploadContainer">
      <button class="close-overlay" onclick="hideUploadContainer()">X</button>
      <h2>Upload New Material</h2>


      {{-- <form action="{{route('submit-form') }}" method="POST" id="image-upload-form" enctype="multipart/form-data"> --}}
        <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name Field -->
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
        </div>

        <!-- Description Field -->
        <div class="form-group">
          <label for="name">Description</label>
          <input type="text" class="form-control" name="description" id="description" placeholder="Enter desription" required>
        </div>

        <!-- Price Field -->
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" name="price" id="price" placeholder="Enter price" required>
        </div>

        <!-- Image Upload Field -->
        <div class="form-group">
          <label for="images">Images</label>
          <input type="file" class="form-control" name="photo[]" id="images" multiple accept="image/*" required>
        </div>

        <!-- Multiple Image Preview Container -->
        <div id="multiple-image-preview-container"></div>

        <button type="submit" class="btn btn-success mt-3">Submit</button>
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

    // Image preview functionality
    document.getElementById('images').addEventListener('change', function(event) {
      const previewContainer = document.getElementById('multiple-image-preview-container');
      previewContainer.innerHTML = ''; // Clear previous previews

      // Convert FileList to Array and create previews
      Array.from(this.files).forEach((file, index) => {
        // Validate file type
        if (!file.type.startsWith('image/')) {
          alert('Please select only image files');
          return;
        }

        // Create preview wrapper
        const wrapper = document.createElement('div');
        wrapper.className = 'image-preview-wrapper';
        wrapper.dataset.index = index;

        // Create image element
        const imgPreview = document.createElement('img');
        imgPreview.file = file;
        imgPreview.classList.add('img-preview');

        // Create remove button
        const removeBtn = document.createElement('button');
        removeBtn.innerHTML = '×';
        removeBtn.className = 'remove-image';
        removeBtn.onclick = function() {
          removeImage(index);
        };

        // Use FileReader to load image
        const reader = new FileReader();
        reader.onload = (function(img) {
          return function(e) {
            img.src = e.target.result;
          };
        })(imgPreview);
        reader.readAsDataURL(file);

        // Append elements
        wrapper.appendChild(imgPreview);
        wrapper.appendChild(removeBtn);
        previewContainer.appendChild(wrapper);
      });
    });

    // Function to remove an image from preview and file input
    function removeImage(indexToRemove) {
      const fileInput = document.getElementById('images');
      const previewContainer = document.getElementById('multiple-image-preview-container');

      // Create a new FileList without the removed file
      const fileList = Array.from(fileInput.files);
      fileList.splice(indexToRemove, 1);

      // Create a new FileList
      const newFileList = new DataTransfer();
      fileList.forEach(file => newFileList.items.add(file));

      // Update file input
      fileInput.files = newFileList.files;

      // Remove preview
      const previewToRemove = previewContainer.querySelector(`.image-preview-wrapper[data-index="${indexToRemove}"]`);
      if (previewToRemove) {
        previewToRemove.remove();
      }

      // Reindex remaining previews
      document.querySelectorAll('.image-preview-wrapper').forEach((wrapper, newIndex) => {
        wrapper.dataset.index = newIndex;
        wrapper.querySelector('.remove-image').onclick = function() {
          removeImage(newIndex);
        };
      });
    }
  </script>



<script>
    window.addEventListener("load", function () {
        setTimeout(function () {
            const preloader = document.getElementById("preloader");
            preloader.style.opacity = "0"; // Start fading out the preloader
            preloader.style.visibility = "hidden"; // Hide the preloader after fading out
        }, 1000); // Delay of 5000 milliseconds (5 seconds)
    });

      </script>

</body>
</html>
