<!DOCTYPE html>
<html>
<head>
    <title>Laravel - sortable product table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container mb-5 mt-4">
    <h3 class="text-center">Add product exercise</h3>
    <hr>
    <div class="d-flex justify-content-center flex-column">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="js-create-product-form" method="POST" action="{{ route('create_product') }}" autocomplete="off" spellcheck="false">
            @csrf
            <input name="ean_13" type="text" class="form-control mb-4" placeholder="EAN-13" value="{{ old('ean_13') }}">
            <input name="title" type="text" class="form-control mb-4" placeholder="Title" value="{{ old('title') }}">
            <input name="stock" type="number" class="form-control mb-4" placeholder="Stock" value="{{ old('stock') }}">
            <input name="cost" type="number"  step="0.01" class="form-control mb-4" placeholder="Cost without VAT" value="{{ old('cost') }}">
            <div class="d-flex justify-content-end">
                <button type="submit" id="js-save-product" class="btn btn-primary float-right">Add product</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-secondary btn-sm" id="reset" href="{{ route('home') }}/#table" role="button">Default order</a>
    </div>
    <a href="#table"></a>
    <table class="table table-bordered mb-4" id="table">
        <tr>
            <th>@sortablelink('ean_13')</th>
            <th>@sortablelink('title')</th>
            <th>@sortablelink('stock')</th>
            <th>@sortablelink('cost')</th>
            <th>@sortablelink('cost', 'Price with VAT')</th>
        </tr>
        @if($products->count())
            @foreach($products as $key => $product)
                <tr>
                    <td>{{ $product->ean_13 }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->cost }}</td>
                    <td>{{ round(($product->cost * 1.21), 2) }}</td>
                </tr>
            @endforeach
        @endif
    </table>
    {!! $products->appends(\Request::except('page'))->render() !!}
</div>
</body>
</html>