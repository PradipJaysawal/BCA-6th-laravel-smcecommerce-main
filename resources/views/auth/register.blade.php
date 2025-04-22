@extends('layouts.master')
@section('content')
    <div class="flex justify-center items-center mt-20">
        <div class="w-96 bg-white p-6 rounded-lg shadow-lg border">
            <h1 class="text-2xl font-bold text-center">Register</h1>
            <form action="{{route('register')}}" method="POST" class="mt-6">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-600 font-bold">Name</label>
                    <input type="name" name="name" id="name" class="w-full border-gray-300 border rounded-lg px-3 py-2 mt-1">
                    @error('name')
                        <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 font-bold">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-300 border rounded-lg px-3 py-2 mt-1">
                    @error('email')
                        <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="password" class="block text-gray-600 font-bold">Password</label>
                    <input type="password" name="password" id="password" class="w-full border-gray-300 border rounded-lg px-3 py-2 mt-1">
                    @error('password')
                        <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-1">
                    <label for="password_confirmation" class="block text-gray-600 font-bold">Password_confirmation</label>
                    <input type="password_confirmation" name="password_confirmation" id="password_confirmation" class="w-full border-gray-300 border rounded-lg px-3 py-2 mt-1">
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="text-right mb-4">
                    {{-- <a href="{{route('password.request')}}" class="text-blue-900 text-sm">Forgot Password ?</a> --}}
                </div>
                <button type="submit" class="w-full bg-blue-900 text-white rounded-lg px-4 py-2 mb-4">Register</button>

                <div className="flex items-center justify-between mb-4">
                    <p>Already have an account?
                    <a href="/login" className="text-blue-500 font-semibold hover:text-orange-600 hover:underline"> Login Now</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection

