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

    {{--  mengambil dari categories update  --}}
    {{-- "{{ route('category.update', $edit->id) }}" parameter $edit diambil dari categories controller   --}}
    <form action="{{ route('product.update', $edit->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="category_id" class="form-label mt-2">Category Name</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($categories as $category)
                            <option {{ $edit->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number" name="product_price" id="" placeholder="Enter product price"
                        class="form-control" value="{{ $edit->product_price }}">
                </div>

                <div class="mb-3">
                    <label for="" class="foem-label">Status</label>
                    <input type="radio" id="is_active_1" value="1" {{ $edit->is_active == '1' ? 'checked' : '' }}
                        name="is_active"> Publish
                    <input type="radio" id="is_active_0" value="0" {{ $edit->is_active == '0' ? 'checked' : '' }}
                        name="is_active"> Draft
                </div>

            </div>

            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="product_name" id="" placeholder="Enter product name"
                        class="form-control" value="{{ $edit->product_name }}">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea name="product_description" id="" cols="20" rows="5" class="form-control">{{ $edit->product_description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Photo</label>
                    <br>
                    <input type="file" name="product_photo">
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Save Change</button>
    </form>
@endsection
