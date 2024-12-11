<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style>
    .header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 60px;
      background-color: #007bff;
      color: white;
      text-align: center;
    }
    .sidebar {
      top:60px;
      position: fixed; 
      top: 60px; 
      left: 0; 
      width: 250px; 
      height: 100%; 
      background-color: #f8f9fa; 
      padding-top: 60px;
    }
      .footer{


      }
    .main{

          margin-left: 250px; 
          margin-top: 60px; 
          padding: 20px;

    }
    .product-container {
      display: flex;
     
       padding: 50px;
      background-color: whitesmoke;
    
      width: 50vw;
      margin: auto;
      border-radius: 10px;
    }
    .image-thumbnails {
  display: flex;
  flex-direction:row; /* Stack thumbnails vertically */
  margin-top: 16px;
  overflow-x: auto;
  gap: 10px;
  width: 100%; /* Ensure thumbnails take up full width */

}

.image-thumbnails img {
      width: 75px;
      /* height: 60px;  */
      object-fit: cover;
      cursor: pointer;
      transition: transform 0.3s;

    } .product-image {
      /* position: relative; */
      width: 400px;
      height: 600px;
     /*  margin-bottom: 20px; */
      display: flex;
      flex-direction: column;
      /* justify-content: space-between; */
      margin-top: 10px;
    }
    .product-info {
      margin-left: 20px;
      max-width: 400px;
      /* display: flex;
      flex-direction: column;
      margin-top: 0%;
      top: 0; */
       /* justify-content: space-between;  */

    }

  </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

</head>
<body>
  <header class="header">
    Header
</header>

<aside class="sidebar">
    Sidebar
</aside>

<main class="main">

  <div class="container">
    <!-- Row 1 -->
    <div class="row">
        <div class="col-md-12 bg-light p-3 mb-3 border">
            <h2>Main Section Row 1</h2>
            <p>Content for the first row in the main section.</p>
        </div>
    </div>
    <!-- Row 2 -->
    <div class="row">
        <div class="col-md-9 bg-info text-white p-3 border">

          <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">

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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet error aliquid eum ad corrupti architecto possimus exercitationem velit, ipsum pariatur tempora fuga at odit dignissimos a libero consequatur cum dolore nesciunt, autem voluptatibus? Consectetur eos enim nisi veritatis. Tempora nesciunt dolor, velit maiores, ducimus doloribus iste odio quia, neque earum quod numquam vero iure repellat? Vel qui, molestiae blanditiis veritatis earum odit voluptatibus numquam ut deserunt nihil? Et, ducimus.</p>
              </div>
              @endforeach
              @endif
              @endisset
            </div>
          </div> 
        </div>  
      </div>
    </div>
      
            
</main>

<script>


</script>

   <!-- Bootstrap JS, Popper.js, and jQuery -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>