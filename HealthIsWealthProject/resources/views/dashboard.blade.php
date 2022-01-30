@extends('frontend.app')
@section('content')
<div class="register">
  <div class="cardHeader">
    Dashboard
  </div>
  <h2 class="sub-t">QUICK STATS</h2>
  <div class="count">
    <div class="count-box">
      <span>{{$post}}</span>
      <p><i class="fas fa-chart-line"></i> Monthly posts</p>
    </div>
    <div class="count-box">
      <span>{{count($posts)}}</span>
      <p><i class="fas fa-chart-line"></i> Yearly posts</p>
    </div>
    <div class="count-box">
      <span>{{$user}}</span>
      <p><i class="fas fa-chart-line"></i> Monthly users</p>
    </div>
    <div class="count-box">
      <span>{{count($users)}}</span>
      <p><i class="fas fa-chart-line"></i> Yearly users</p>
    </div>
  </div>
  <h2 class="sub-t">WEEKLY POST</h2>
  <canvas id="myChart"></canvas>
</div>
@endsection