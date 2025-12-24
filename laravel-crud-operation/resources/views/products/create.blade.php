<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>laravel 12 crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    
    <div class="bg-dark text-center text-white py-3">
            <h1 class="h2">laravel 12 crud</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-end p-0 mt-3">
                <a href="{{ route('products.index') }}" class="btn btn-dark">Create</a>
            </div>
            <div class="card p-0 mt-3 mb-5">
                <div class="card-header bg-dark text-white">
                    <div class="h4">Create Product</div>
                </div>
                <div class="card-body shadow-lg">
                    <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name">
                        </div>

                        @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                         <div class="mb-3">
                            <label for="image" class="form-label @error('image') is-invalid @enderror">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                         @error('image')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                         <div class="mb-3">
                            <label for="sku" class="form-label @error('sku') is-invalid @enderror">SKU</label>
                            <input value="{{ old('sku') }}" type="text" class="form-control" id="sku" name="sku" placeholder="SKU">
                        </div>

                        @error('sku')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="price" class="form-label @error('price') is-invalid @enderror">Price</label>
                            <input value="{{ old('price') }}" type="text" class="form-control" id="price" name="price" placeholder="Price">
                        </div>

                        @error('price')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                         <div class="mb-3">
                            <label for="price" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <button class="btn btn-dark">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>