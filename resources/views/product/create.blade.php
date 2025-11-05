@extends('app')
@section('content')

    @if ($errors->any())
        <div style="color: red;">


            <ul>
                @foreach ($errors->all() as $er)
                    <div class="alert alert-primary" role="alert">
                        {{ $er }}
                        Akun sudah ada
                    </div>
                @endforeach
            </ul>

        </div>
    @endif

    {{--  jika ingin kirim foto tambahkan enctype  --}}
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="category_id" class="form-label mt-2">Category Name</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number" name="product_price" id="" placeholder="Enter product price"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label for="" class="foem-label">Status</label>
                    <input type="radio" id="is_active_1" value="1" name="is_active"> Publish
                    <input type="radio" id="is_active_0" value="0" name="is_active"> Draft
                </div>

            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="product_name" id="" placeholder="Enter product name"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea name="product_description" id="" cols="20" rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Photo</label>
                    <br>
                    <input type="file" name="product_photo" id="">
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>
@endsection
