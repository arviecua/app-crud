<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Product</h1>
    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $errors)
                    <li>{{$errors}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{route('product.update',['product'=>$prod])}}" >
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="name" value="{{$prod->name}}" />
        </div>
        <div>
            <label for="qty">Qty</label>
            <input type="text" name="qty" id="qty" placeholder="Qty" value="{{$prod->qty}}" />
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" placeholder="Price" value="{{$prod->price}}" />
        </div>
        <div>
            <label for="desc">Description</label>
            <input type="text" name="description" id="desc" placeholder="Description" value="{{$prod->description}}" />
        </div>
        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
</body>
</html>