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
      <li class="nav-item">
        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#profile">
          <span class="icon-holder">
            <i class="c-deep-blue-500 bi bi-person-badge mR-10"></i>
          </span>
          <span class="title">Profile</span>
        </a>
      </li>
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
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profile">Update Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="profile_update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="border">
          <div class="row m-1">
            <div class="col-md-4 card">
              <div class="card-body">
                @if(!(Auth()->user()->avatar))
                <div class="file-upload">
                  <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="profile" />
                  <div class="drag-text">
                    <h3>
                      <button class="btn btn-outline-success" type="button" onclick="$('.file-upload-input').trigger( 'click' )">
                        <i class="fa fa-plus"></i> Add Image
                      </button>
                    </h3>
                  </div>
                  <div class="file-upload-content">
                    <img class="file-upload-image" src="{{asset('storage/profile/'.Auth()->user()->avatar)}}" alt="your image" />
                    <div class="image-title-wrap">
                      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                    </div>
                  </div>
                </div>
                @else
                <img src="{{asset('storage/profile/'.Auth()->user()->avatar)}}" style="width:100% ;">
                <div class='d-flex justify-content-center mt-2'>
                  <a href="" data-bs-toggle="modal" data-bs-target="#image">Change</a>
                </div>
                @endif
              </div>
            </div>

            <div class="col-md-8  p-2">
              <div class="form-floating mt-1">
                <input type="text" name="f_name" class="form-control" id="floatingInput" placeholder=" " value="{{Auth()->user()->name}}">
                <label for="floatingInput">Name</label>
              </div>
              <div class="form-floating mt-1">
                <input type="tel" name="contact" class="form-control" id="floatingPassword" placeholder=" " value="{{Auth()->user()->contact}}">
                <label for="floatingPassword">Contact</label>
              </div>
              <div class="form-floating mt-1">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder=" " value="{{Auth()->user()->email}}">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mt-1">
                <input type="text" name="about" class="form-control" id="floatingInput" placeholder=" " value="{{Auth()->user()->about}}">
                <label for="floatingInput">About me</label>
              </div>
            </div>
          </div>
          <div class="modal-footer mb-2">
            <button type="reset" class="btn btn-outline-secondary m-2">Clear</button>
            <button type="submit" class="btn btn-outline-success m-2">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="image" tabindex="-1" aria-labelledby="image" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="text-align: center;">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="image">Change image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action='/changeprof' method='post' enctype='multipart/form-data'>
        @csrf
        <div class="modal-body">
          <input class="form-control" type='file' name="passport" accept="image/*">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Change</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="{{asset('storage/js/adminator.js')}}"></script>
<script src="{{asset('storage/js/imageUpload.js')}}"></script>
<script src="{{asset('storage/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection