<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details - Sport Indirect</title>
  <link rel="stylesheet" href="{{ asset('css/productdetail.css') }}">
</head>

@extends('layout.userlayout')

@section('content')
<body>
    @php
    $product = (object)[
        'name' => 'Nike Vomero 18',
        'price' => 'RM 669',
        'description' => 'Experience supreme comfort and support with the Nike Vomero 18, designed for long-distance running. Its soft cushioning and breathable upper provide unmatched performance.',
        'main_image' => asset('images/Nike Vomero 18.png'),
        'gallery' => [
            asset('images/category-basketball.png'),
            asset('images/category-basketball.png')
        ],
        'colors' => [
            ['color' => 'black', 'image' => asset('images/category-basketball.png')],
            ['color' => 'gray', 'image' => asset('images/category-basketball.png')],
            ['color' => 'blue', 'image' => asset('images/category-basketball.png')]
        ],
        'sizes' => ['US 7', 'US 8', 'US 9', 'US 10'],
        'reviews' => [
            ['name' => 'John Doe', 'rating' => 5, 'comment' => 'Great comfort and support! Perfect for long runs.'],
            ['name' => 'Jane Smith', 'rating' => 4, 'comment' => 'Very comfortable, but took a while to break in.'],
            ['name' => 'Mike Lee', 'rating' => 5, 'comment' => 'Best running shoes I’ve ever owned!']
        ]
    ];
    @endphp

    <div class="container">
        <!-- Image Section -->
        <div class="image-section">
            <div class="main-image">
                <img id="mainImage" src="{{ $product->main_image }}" alt="{{ $product->name }}">
            </div>
            <div class="image-gallery">
                @foreach ($product->gallery as $galleryImage)
                    <img src="{{ $galleryImage }}" alt="Gallery Image" onclick="changeMainImage('{{ $galleryImage }}')">
                @endforeach
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="product-details">
            <p class="product-title">{{ $product->name }}</p>
            <p class="price">{{ $product->price }}</p>

            <!-- Color Selection -->
            <div class="color-selection">
                <p>Select Color:</p>
                <div class="colors">
                    @foreach ($product->colors as $colorOption)
                        <div class="color-box" style="background: {{ $colorOption['color'] }};" 
                            onclick="selectColor('{{ $colorOption['color'] }}', '{{ $colorOption['image'] }}', event)">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Size Selection -->
            <div class="size-selection">
                <p>Select Size:</p>
                <div class="sizes">
                    @foreach ($product->sizes as $size)
                        <div class="size-box" onclick="selectSize(event)">{{ $size }}</div>
                    @endforeach
                </div>
            </div>

            <button class="add-to-cart">Add to Bag</button>

            <div class="description">
                <p>{{ $product->description }}</p>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="reviews">
            <h3>Customer Reviews</h3>
            @foreach ($product->reviews as $review)
                <div class="review">
                    <p><strong>{{ $review['name'] }}</strong> - 
                        @for ($i = 0; $i < $review['rating']; $i++)
                            ★
                        @endfor
                    </p>
                    <p>{{ $review['comment'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        let selectedColor = null;
        let selectedSize = null;

        function changeMainImage(imageSrc) {
            document.getElementById('mainImage').src = imageSrc;
        }

        function selectColor(color, imageSrc, event) {
            selectedColor = color;
            changeMainImage(imageSrc);

            // Remove selected class from all color boxes and add to clicked one
            document.querySelectorAll('.color-box').forEach(box => box.classList.remove('selected'));
            event.target.classList.add('selected');

            // Enable size options (if needed) and reset selected size
            document.querySelectorAll('.size-box').forEach(size => size.classList.add('enabled'));
            selectedSize = null;
            document.querySelector('.add-to-cart').classList.remove('enabled');
        }

        function selectSize(event) {
            selectedSize = event.target.innerText;
            // Remove selected class from all size boxes and add to clicked one
            document.querySelectorAll('.size-box').forEach(size => size.classList.remove('selected'));
            event.target.classList.add('selected');

            // Enable Add to Bag button if color is selected
            if (selectedColor) {
                document.querySelector('.add-to-cart').classList.add('enabled');
            }
        }
    </script>
</body>
</html>
@endsection
