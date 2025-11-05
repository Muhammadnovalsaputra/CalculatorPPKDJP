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


    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <label for="" class="form-label mt-2">Username</label>
        <input type="text" name="name" class="form-control" required>

        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>

        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>

        <button type="submit" class="btn btn-primary mt-2">Create</button>
    </form>
@endsection
