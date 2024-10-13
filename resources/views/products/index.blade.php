<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-listing {
            margin-bottom: 30px;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            padding: 15px;
            background-color: #fff;
            transition: box-shadow 0.3s ease;
        }

        .product-listing:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            width: 250px;
            height: 180px;
            object-fit: contain;
            border-radius: 5px;
        }

        .product-details {
            padding-left: 20px;
        }

        .product-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 18px;
            color: #ff5722;
            font-weight: bold;
            margin-top: 5px;
        }

        .product-category {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .product-desc {
            font-size: 14px;
            color: #777;
        }

        .product-list-container {
            display: flex;
            flex-direction: row;
        }

        .product-actions {
            text-align: right;
            margin-top: 15px;
        }

        .btn-primary {
            background-color: #0071c2;
            border-color: #0071c2;
        }

        .btn-primary:hover {
            background-color: #005fa3;
            border-color: #005fa3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-5">Products</h1>
        @foreach($products as $product)
        <div class="product-listing">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $product->image }}" alt="{{ $product->title }}" class="product-image">
                </div>
                <div class="col-md-8 product-details">
                    <div class="product-title">{{ $product->title }}</div>
                    <div class="product-category">{{ ucwords($product->category->name) }}</div>
                    <div class="product-desc">{{ $product->description }}</div>
                    <div class="product-price">${{ $product->price }}</div>
                    <div class="product-actions">
                        <a href="{{ $product->image }}" class="btn btn-primary" target="_blank">View Product</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


</body>
</html>
