<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="container" style="display: flex; gap: 2rem">
        @foreach ($products as $product)
            <div class="flex: 1">

                <img src="{{ $product->image }}" alt="image" style="height: 200px ; width: 300px">
                <h3>{{ $product->name }}</h3>
                <p><b>{{$product->price}}</b></p>

            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center my-5px">
            <form action="{{ route('plans',['prod_id'=>$product->id]) }}" method="POST">
                @csrf
                <button   style="margin: 20px">Subscribe With Paypal</button>
            </form>

        </div>
        @endforeach


</body>

</html>
