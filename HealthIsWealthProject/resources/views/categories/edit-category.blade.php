@extends('layouts.app')
@section('content')
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1 style="padding-top: 50px;">Edit Category!</h1>
           
            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{ route('categories.update', $category) }}" method="post" >
                    @method('put')
                    @csrf
                    <!-- name -->
                    <label for="name"><span>Name</span></label>
                    <input type="text" id="name" name="name" value="{{ $category->name }}" />
                    @error('name')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
            </div>
            <div class="create-categories">
                <a href="{{route('categories.index')}}">Categories list <span>&#8594;</span></a>
            </div>
        </section>
    </main>
@endsection


