!@extends('app')
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


    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="" class="form-label mt-2">Username</label>
        <input type="text" name="name" class="form-control" name="name"
            value="{{ $user ? $user->name : old('name') }}" required>

        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $user ? $user->email : old['email'] }}"
            required>

        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>

        <button type="submit" class="btn btn-primary mt-2">Create</button>
    </form>
@endsection
