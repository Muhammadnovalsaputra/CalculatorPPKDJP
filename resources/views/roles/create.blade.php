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


    <form action="{{ route('role.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label mt-2">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                placeholder="Enter you category name" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>
@endsection
