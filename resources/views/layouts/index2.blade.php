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
      <li class="nav-item">
        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#resources">
          <span class="icon-holder">
            <i class="c-deep-orange-500 bi bi-files mR-10"></i>
          </span>
          <span class="title">Add Resource</span>
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
<!-- Modal -->
<div class="modal fade" id="resources" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resources">Add File to resources</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="/uploadresource" enctype="multipart/form-data">
        <div class="modal-body text-black">
          @csrf
          <div class="mb-3">
            <select class="form-select" name="category">
              <option selected>Select Category</option>
              <option class="form-control" value="Adventurers">Adventurers</option>
              <option class="form-control" value="Pathfinders">Pathfinders</option>
              <option class="form-control" value="Master Guide">Master Guide</option>
            </select>
              @error('category')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="filename" placeholder=" ">
            <label for="floatingInput">Filename</label>
            @error('filename')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="row mb-3">
            <label for="file" class="">{{ __('File') }}</label>

            <div class="">
              <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" required autocomplete="">

              @error('file')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="isPublic" value="1" checked>
                <label class="form-check-label" for="remember">
                  {{ __('Is Public') }}
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save file</button>
        </div>
        </form>
    </div>
  </div>
</div>
<script src="{{asset('storage/js/adminator.js')}}"></script>
<script src="{{asset('storage/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection