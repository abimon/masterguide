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
        <a class="nav-link" href="/compose">
          <span class="icon-holder">
            <i class="c-blue-500 bi bi-share mR-10"></i>
          </span>
          <span class="title">Blog</span>
        </a>
      </li>
      @if(Auth()->user()->role != 'Member')
      <li class="nav-item">
        <a class="nav-link" href="/attendance">
          <span class="icon-holder">
            <i class="c-brown-500 bi bi-r-square mR-10"></i>
          </span>
          <span class="title">Members</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" data-bs-target="#event" data-bs-toggle="modal">
          <span class="icon-holder">
            <i class="c-deep-orange-500 bi bi-pin mR-10"></i>
          </span>
          <span class="title">Events</span>
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
        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#inst">
          <span class="icon-holder">
            <i class="c-deep-black-500 bi bi-files mR-10"></i>
          </span>
          <span class="title">Institution</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#less">
          <span class="icon-holder">
            <i class="c-black bi bi-card-list mR-10"></i>
          </span>
          <span class="title">Add Lessons</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="/lesson">
          <span class="icon-holder">
            <i class="c-red bi bi-card-list mR-10"></i>
          </span>
          <span class="title">Lessons</span>
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
        <a class="nav-link" href="/chat">
          <span class="icon-holder">
            <i class="c-deep-purple-500 bi bi-chat mR-10"></i>
          </span>
          <span class="title">Chat</span>
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
              <option class="form-control" value="adv">Adventurers</option>
              <option class="form-control" value="pf">Pathfinders</option>
              <option class="form-control" value="mg">Master Guide</option>
            </select>
            @error('category')
            <span class="invalid-feedback" role="alert">
              <strong>{{$message }}</strong>
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
      <form action="/profile_update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="border">
          <div class="row m-1">
            <div class="col-md-4 card">
              <div class="card-body">
                <img src="{{asset('storage/profile/'.Auth()->user()->avatar)}}" style="width:100% ;">
                <div class='d-flex justify-content-center mt-2'>
                  <a href="" data-bs-toggle="modal" data-bs-target="#image">Change</a>
                </div>
              </div>
            </div>
            <div class="col-md-8  p-2">
              <div class="form-floating mt-1">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder=" " value="{{Auth()->user()->name}}">
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
            </div>
            <div class="col-12">
              <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Institution') }}</label>

                <div class="col-md-8">
                  <input id="institution" type="text" class="form-control @error('institution') is-invalid @enderror" name="institution" value="{{Auth()->user()->institution}}" required autocomplete="name" autofocus>

                  @error('institution')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Birth Date') }}</label>

                <div class="col-md-8">
                  <input id="name" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{Auth()->user()->birthday}}" required autocomplete="name" autofocus>

                  @error('birthday')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-8 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="isInvested" id="remember" value="1" {{ (Auth()->user()->isInvested) ? 'checked' : '' }} data-bs-toggle="collapse" data-bs-target="#ppno" aria-expanded="false" aria-controls="collapseWidthExample">

                    <label class="form-check-label" for="remember">
                      {{ __('I am invested') }}
                    </label>
                  </div>
                </div>
              </div>
              <div>
                <div class="collapse collapse-horizontal" id="ppno">
                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Passbook No.') }}</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control @error('PPNo') is-invalid @enderror" name="PPNo" value="{{ old('PPNo') }}" autocomplete="name" autofocus>
                      @error('PPNo')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="isAssociate" value="1" id="remember" {{(Auth()->user()->isAssociate) ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('I am an associate') }}
                    </label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="about" class="col-md-4 col-form-label text-md-end">{{ __('Something about you') }}</label>

                <div class="col-md-8">
                  <textarea id="about" type="text" class="form-control @error('about') is-invalid @enderror" name="about" required autocomplete="about">{{Auth()->user()->about}}</textarea>

                  @error('about')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
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
<div class="modal fade" id="event">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="bd p-15 d-flex justify-content-between">
        <h5 class="m-0">Add Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/addPublicEvent" method="post">
          @csrf
          <div class="form-group">
            <label class="fw-500">Event title</label>
            <input type='text' class="form-control bdc-grey-200" name="event_title">
          </div>
          <div class="form-group">
            <label class="fw-500">Event Date</label>
            <input type="date" class="form-control bdc-grey-200" name="event_date" value={{date('Y-m-d')}}>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label class="fw-500">Start Time</label>
              <div class="timepicker-input input-icon form-group">
                <div class="input-group">
                  <input type="time" class="form-control bdc-grey-200 start-date" name="event_time">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="fw-500">Duration</label>
              <div class="timepicker-input input-icon form-group">
                <div class="input-group">
                  <input type="number" class="form-control bdc-grey-200 end-date" name="event_duration" value="1">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="fw-500">Venue</label>
            <input type='text' class="form-control bdc-grey-200" name="venue">
          </div>
          <div class="form-group">
            <label class="fw-500">Charges</label>
            <input type='text' class="form-control bdc-grey-200" name="charges">
          </div>
          <div class="form-group">
            <label class="fw-500">Event Description</label>
            <textarea class="form-control bdc-grey-200" rows='5' id="post" name="event_description"></textarea>
          </div>
          <div class="text-right">
            <button class="btn btn-primary cur-p" type="submit">Done</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="less">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="bd p-15 d-flex justify-content-between">
        <h5 class="m-0">Add Lesson</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/addLesson" method="post">
          @csrf
          <div class="form-group">
            <label class="fw-500">Lesson title</label>
            <input type='text' class="form-control bdc-grey-200" name="title">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="fw-500">Date</label>
                <input type="date" class="form-control bdc-grey-200" name="date" value={{date('Y-m-d')}}>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="fw-500">Facilitator</label>
                <input type="text" class="form-control bdc-grey-200 end-date" name="facilitator">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="fw-500">Lesson Objectives</label>
            <textarea class="form-control bdc-grey-200" rows='5' id="objectives" name="objectives"></textarea>
          </div>
          <div class="text-right">
            <button class="btn btn-primary cur-p" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="inst">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="bd p-15 d-flex justify-content-between">
        <h5 class="m-0">Add Shurch/Institution</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/addInstitution" method="post">
          @csrf
          <div class="form-group">
            <label class="fw-500">Institution/Church</label>
            <input type='text' class="form-control bdc-grey-200" name="institution" placeholder="Eg. Marejeleo SDA">
          </div>
          <div class="text-right">
            <button class="btn btn-primary cur-p" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/super-build/ckeditor.js"></script>
<script>
  CKEDITOR.ClassicEditor
    .create(document.getElementById("post"), {
      toolbar: {
        items: [
          'exportPDF', 'exportWord', '|',
          'findAndReplace', 'selectAll', '|',
          'heading', '|',
          'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
          'bulletedList', 'numberedList', 'todoList', '|',
          'outdent', 'indent', '|',
          'undo', 'redo', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
          'alignment', '|',
          'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
          'specialCharacters', 'horizontalLine', 'pageBreak', '|',
          'textPartLanguage', '|',
          'sourceEditing'
        ],
        shouldNotGroupWhenFull: true
      },
      list: {
        properties: {
          styles: true,
          startIndex: true,
          reversed: true
        }
      },
      heading: {
        options: [{
            model: 'paragraph',
            title: 'Paragraph',
            class: 'ck-heading_paragraph'
          },
          {
            model: 'heading1',
            view: 'h1',
            title: 'Heading 1',
            class: 'ck-heading_heading1'
          },
          {
            model: 'heading2',
            view: 'h2',
            title: 'Heading 2',
            class: 'ck-heading_heading2'
          },
          {
            model: 'heading3',
            view: 'h3',
            title: 'Heading 3',
            class: 'ck-heading_heading3'
          },
          {
            model: 'heading4',
            view: 'h4',
            title: 'Heading 4',
            class: 'ck-heading_heading4'
          },
          {
            model: 'heading5',
            view: 'h5',
            title: 'Heading 5',
            class: 'ck-heading_heading5'
          },
          {
            model: 'heading6',
            view: 'h6',
            title: 'Heading 6',
            class: 'ck-heading_heading6'
          }
        ]
      },

      fontFamily: {
        options: [
          'default',
          'Arial, Helvetica, sans-serif',
          'Courier New, Courier, monospace',
          'Georgia, serif',
          'Lucida Sans Unicode, Lucida Grande, sans-serif',
          'Tahoma, Geneva, sans-serif',
          'Times New Roman, Times, serif',
          'Trebuchet MS, Helvetica, sans-serif',
          'Verdana, Geneva, sans-serif'
        ],
        supportAllValues: true
      },
      fontSize: {
        options: [10, 12, 14, 'default', 18, 20, 22],
        supportAllValues: true
      },
      htmlSupport: {
        allow: [{
          name: /.*/,
          attributes: true,
          classes: true,
          styles: true
        }]
      },
      htmlEmbed: {
        showPreviews: true
      },
      link: {
        decorators: {
          addTargetToExternalLinks: true,
          defaultProtocol: 'https://',
          toggleDownloadable: {
            mode: 'manual',
            label: 'Downloadable',
            attributes: {
              download: 'file'
            }
          }
        }
      },
      mention: {
        feeds: [{
          marker: '@',
          feed: [
            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
            '@sugar', '@sweet', '@topping', '@wafer'
          ],
          minimumCharacters: 1
        }]
      },
      removePlugins: [
        'CKBox',
        'CKFinder',
        'EasyImage',
        'RealTimeCollaborativeComments',
        'RealTimeCollaborativeTrackChanges',
        'RealTimeCollaborativeRevisionHistory',
        'PresenceList',
        'Comments',
        'TrackChanges',
        'TrackChangesData',
        'RevisionHistory',
        'Pagination',
        'WProofreader',
        'MathType'
      ]
    }).then(editor => {
      editor.editing.view.change(writer => {
        writer.setStyle('min-height', '350px', editor.editing.view.document.getRoot());
      });
    });
    CKEDITOR.ClassicEditor
    .create(document.getElementById("objectives"), {
      toolbar: {
        items: [
          'exportPDF', 'exportWord', '|',
          'findAndReplace', 'selectAll', '|',
          'heading', '|',
          'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
          'bulletedList', 'numberedList', 'todoList', '|',
          'outdent', 'indent', '|',
          'undo', 'redo', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
          'alignment', '|',
          'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
          'specialCharacters', 'horizontalLine', 'pageBreak', '|',
          'textPartLanguage', '|',
          'sourceEditing'
        ],
        shouldNotGroupWhenFull: true
      },
      list: {
        properties: {
          styles: true,
          startIndex: true,
          reversed: true
        }
      },
      heading: {
        options: [{
            model: 'paragraph',
            title: 'Paragraph',
            class: 'ck-heading_paragraph'
          },
          {
            model: 'heading1',
            view: 'h1',
            title: 'Heading 1',
            class: 'ck-heading_heading1'
          },
          {
            model: 'heading2',
            view: 'h2',
            title: 'Heading 2',
            class: 'ck-heading_heading2'
          },
          {
            model: 'heading3',
            view: 'h3',
            title: 'Heading 3',
            class: 'ck-heading_heading3'
          },
          {
            model: 'heading4',
            view: 'h4',
            title: 'Heading 4',
            class: 'ck-heading_heading4'
          },
          {
            model: 'heading5',
            view: 'h5',
            title: 'Heading 5',
            class: 'ck-heading_heading5'
          },
          {
            model: 'heading6',
            view: 'h6',
            title: 'Heading 6',
            class: 'ck-heading_heading6'
          }
        ]
      },

      fontFamily: {
        options: [
          'default',
          'Arial, Helvetica, sans-serif',
          'Courier New, Courier, monospace',
          'Georgia, serif',
          'Lucida Sans Unicode, Lucida Grande, sans-serif',
          'Tahoma, Geneva, sans-serif',
          'Times New Roman, Times, serif',
          'Trebuchet MS, Helvetica, sans-serif',
          'Verdana, Geneva, sans-serif'
        ],
        supportAllValues: true
      },
      fontSize: {
        options: [10, 12, 14, 'default', 18, 20, 22],
        supportAllValues: true
      },
      htmlSupport: {
        allow: [{
          name: /.*/,
          attributes: true,
          classes: true,
          styles: true
        }]
      },
      htmlEmbed: {
        showPreviews: true
      },
      link: {
        decorators: {
          addTargetToExternalLinks: true,
          defaultProtocol: 'https://',
          toggleDownloadable: {
            mode: 'manual',
            label: 'Downloadable',
            attributes: {
              download: 'file'
            }
          }
        }
      },
      mention: {
        feeds: [{
          marker: '@',
          feed: [
            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
            '@sugar', '@sweet', '@topping', '@wafer'
          ],
          minimumCharacters: 1
        }]
      },
      removePlugins: [
        'CKBox',
        'CKFinder',
        'EasyImage',
        'RealTimeCollaborativeComments',
        'RealTimeCollaborativeTrackChanges',
        'RealTimeCollaborativeRevisionHistory',
        'PresenceList',
        'Comments',
        'TrackChanges',
        'TrackChangesData',
        'RevisionHistory',
        'Pagination',
        'WProofreader',
        'MathType'
      ]
    }).then(editor => {
      editor.editing.view.change(writer => {
        writer.setStyle('min-height', '250px', editor.editing.view.document.getRoot());
      });
    });
</script>
<script src="{{asset('storage/js/adminator.js')}}"></script>
<script src="{{asset('storage/js/imageUpload.js')}}"></script>
<script src="{{asset('storage/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection