@extends('layouts.layouts')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white rounded-lg shadow p-6">
        <div>
            <h2 class="text-xl font-bold">{{ $user->name }}</h2>
            <p class="text-gray-600">{{ $user->email }}</p>
        </div>
    </div>
</div>
@endsection