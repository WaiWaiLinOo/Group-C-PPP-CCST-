@extends('frontend.app')
@section('content')
<div class="content-contact">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <h3 class="cardHeader">Contact Form</h3>
  <div class="contact clearfix">
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.191719190379!2d96.15472821481795!3d16.8168424384229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ecab9edba127%3A0x7f5dbf4228534185!2sPearl%20Condo%2C%20Corner%20of%20Kabar%20Aye%20Pagoda%20Road%20and%20Sayar%20San%20Road%2C%20Yangon!5e0!3m2!1sen!2smm!4v1638109531941!5m2!1sen!2smm" frameborder="0"></iframe>
    </div>
    <div class="contactform">
      <form action="{{route('contact.store')}}" method="POST">
        @csrf
        <div>
          <label for="fname">First Name</label>
          <input type="text" id="fname" name="first_name" placeholder="Your name.." value="{{old('first_name')}}">
        </div>
        <div>
          <label for="lname">Last Name</label>
          <input type="text" id="lname" name="last_name" placeholder="Your last name.." value="{{old('last_name')}}">
        </div>
        <div>
          <label for="subject">Subject</label>
          <textarea id="subject" name="detail" placeholder="Write something.." style="height:200px"></textarea>
          <input type="submit" value="Submit" id="submits" value="{{old('detail')}}">
        </div>
      </form>
    </div>
  </div>
  </body>

  </html>
</div>
@endsection