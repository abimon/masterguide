@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('storage/css/adminator.css')}}">
<link rel="stylesheet" href="{{asset('storage/css/app.css')}}">
<link rel="stylesheet" href="{{asset('storage/css/themify_icons.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<!-- @App Content -->
<!-- =================================================== -->
<div class="row">
  <!-- #Left Sidebar ==================== -->
  <div class="col-md-2" id="">
    <ul class="nav flex-row">
      <li class="nav-item">
        <a class="nav-link" href="/">
          <span class="icon-holder">
            <i class="c-green-500 bi bi-house mR-10"></i>
          </span>
          <span class="title">Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <span class="icon-holder">
            <i class="c-deep-purple-500 bi bi-speedometer mR-10"></i>
          </span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/chat">
          <span class="icon-holder">
            <i class="c-deep-purple-500 bi bi-chat mR-10"></i>
          </span>
          <span class="title">Chat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/compose">
          <span class="icon-holder">
            <i class="c-blue-500 bi bi-share mR-10"></i>
          </span>
          <span class="title">Compose</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/mail">
          <span class="icon-holder">
            <i class="c-brown-500 bi bi-envelope mR-10"></i>
          </span>
          <span class="title">Email</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/calendar">
          <span class="icon-holder">
            <i class="c-deep-orange-500 bi bi-calendar mR-10"></i>
          </span>
          <span class="title">Calendar</span>
        </a>
      </li>
      <hr>
      <li class="nav-item ">
        <a class="nav-link text-danger" href="/logout">
          <span class="icon-holder ">
            <i class="bi bi-power mR-10"></i>
          </span>
          <span>Logout</span>
        </a>
      </li>
      <hr>
    </ul>
  </div>

  <!-- #Main ============================ -->
  <div class="col-md-10">
    <!-- ### $Topbar ### -->

    <div>
      @yield('dashboard')
    </div>
  </div>
</div>
<script src="{{asset('storage/js/adminator.js')}}"></script>
<script src="{{asset('storage/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection