<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="manufacturer/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <header class="header">


    <div class="logo d-flex">
      <img src="{{ asset('storage/images/logo.png') }}" alt="BICCOUNT GROUP Logo" />
    </div>

    
    <div class="menu-icon" onclick="toggleMenu()">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
  </div>
</header>

<aside >

    <div class="sidebar" id="sidebar">
    <button class="sidebar-btn">
    <i class="bi bi-house me-2"></i> Home
    </button>
    <button class="sidebar-btn" onclick="showUploadContainer()">
    <i class="bi bi-plus me-2"></i>
    Add Material
    </button>
    <button class="sidebar-btn" onclick="()">
    <i class="bi bi-cart me-2"></i> Orders
    </button>
    <a href="{{ route('logout') }}"></a>
    <button class="logout-btn" title="Logout">
    <i class="bi bi-box-arrow-right"></i>LOGOUT
    </div>  
</aside>

<main class="main">

  <div class="container">
    <!-- Row 1 -->
    <div class="row">
        <div class="col-md-12 bg-light p-3 mb-3 border">
            <h2>Manufacturer</h2>
            <p>Content for the first row in the main section.</p>
        </div>
    </div>
    <!-- Row 2 -->
    <div class="row">
        <div class="col-md-9 p-3 border">

          <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
          
            <div class="carousel-inner">

              @isset($materials)
              @if($materials->isEmpty())
                  <p>No materials available.</p>
              @else

              @foreach($materials as $index=>$material)


              <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">  
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
                    </div> 
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
              </div>

              <button class="carousel-control-prev " style="color: #28a745;" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            
              @endforeach
              @endif
              @endisset
              
            </div>
          </div> 
        </div>  

        <div class="col-md-3 p-3 border">
          <div>
            <p>Lorem ipsum dolor sit amet c tempore minima libero delectus et vero. Sint perferendis nostrum numquam aut, aperiam aliquam quia harum deserunt deleniti ratione odio repudiandae nesciunt, tempora odit nisi omnis doloremque optio vel saepe qui. Commodi porro nihil accusamus est.</p>
          </div>
          <div>
            <p>Lorem ipsum dolor sit amet accusantium eligendi tempora facilis laboriosam ratione, quam odio aut provident eius nobis quibusdam sint asperiores autem dolor vel possimus architecto? Quod, ullam distinctio placeat repudiandae similique facere corrupti suscipit, dolorum dolores, facilis excepturi reiciendis?
            </p>
          </div>

        </div>

      </div>
    </div>
   
  </div>
            
</main>




<script>
function toggleMenu() {
  const sidebar = document.getElementById("sidebar");
             {
              const sidebar = document.getElementById("sidebar");
            if (sidebar.style.transform === "translateX(0%)") {
                sidebar.style.transform = "translateX(-100%)"; // Hide the sidebar
            } else {
                sidebar.style.transform = "translateX(0%)"; // Show the sidebar
            }

                
            }
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

   <!-- Bootstrap JS, Popper.js, and jQuery -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>