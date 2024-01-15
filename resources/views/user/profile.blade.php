{{-- resources/views/profile.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profiel Bewerken</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>

            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        @endif
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Naam:</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}">
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}">
            </div>
            <div>
                <label for="birthday">Verjaardag:</label>
                <input type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}">
            </div>
            <div>
                <label for="about_me">Over mij:</label>
                <textarea name="about_me">{{ old('about_me', $user->about_me) }}</textarea>
            </div>
            <div>
                <label for="avatar">Avatar:</label>
                <input type="file" name="avatar">
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" width="100">
                @endif
            </div>
            <button type="submit">Bijwerken</button>
        </form>
    </div>
@endsection
