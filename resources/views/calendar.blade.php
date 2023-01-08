@extends('layouts.index2',['title'=>'Calendar'])
@section('dashboard')
<!-- ### $App Screen Content ### -->
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="container-fluid">
      <div class="bdrs-3 ov-h bgc-white bd">
        <div class="bgc-deep-purple-500 ta-c p-30">
          <h1 class="fw-300 mB-5 lh-1 c-white">{{date('F jS, Y')}}</h1>
          <h3 class="c-white">{{date('l')}}</h3>
          <h5 class="text-warning">{{date('h:i A')}}</h5>
        </div>
        <div class="pos-r">
          <button type="button" data-bs-toggle="modal" data-bs-target="#event" class="mT-nv-50 pos-a r-10 t-2 btn cur-p bdrs-50p p-0 w-3r h-3r btn-warning">
            <i class=" bi bi-plus "></i>
          </button>
          <ul class="m-0 p-0 mT-20">
            <li class="bdB peers ai-c jc-sb fxw-nw">
              <a class="td-n p-20 peers fxw-nw mR-20 peer-greed c-grey-900" href="javascript:void(0);" data-toggle="modal" data-target="#calendar-edit">
                <div class="peer mR-15">
                  <i class="fa fa-fw fa-clock-o c-red-500"></i>
                </div>
                <div class="peer">
                  <span class="fw-600">All Day Event</span>
                  <div class="c-grey-600">
                    <span class="c-grey-700">Nov 01 - </span>
                    <i>Website Development</i>
                  </div>
                </div>
              </a>
              <div class="col-md-2">
                <div class="">
                  <a href="" class="td-n c-deep-purple-500 cH-blue-500 fsz-md p-5">
                    <i class="bi bi-pencil"></i>
                  </a>
                </div>
                <div class="">
                  <a href="" class="td-n c-red-500 cH-blue-500 fsz-md p-5">
                    <i class="bi bi-trash"></i>
                  </a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="modal fade" id="calendar-edit">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="bd p-15">
              <h5 class="m-0">Add Event</h5>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label class="fw-500">Event title</label>
                  <input class="form-control bdc-grey-200">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="fw-500">Start</label>
                    <div class="timepicker-input input-icon form-group">
                      <div class="input-group">
                        <div class="input-group-addon bgc-white bd bdwR-0">
                          <i class="ti-calendar"></i>
                        </div>
                        <input type="text" class="form-control bdc-grey-200 start-date" placeholder="Datepicker" data-provide="datepicker">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="fw-500">End</label>
                    <div class="timepicker-input input-icon form-group">
                      <div class="input-group">
                        <div class="input-group-addon bgc-white bd bdwR-0">
                          <i class="ti-calendar"></i>
                        </div>
                        <input type="text" class="form-control bdc-grey-200 end-date" placeholder="Datepicker" data-provide="datepicker">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="fw-500">Event title</label>
                  <textarea class="form-control bdc-grey-200" rows='5'></textarea>
                </div>
                <div class="text-right">
                  <button class="btn btn-primary cur-p" data-dismiss="modal">Done</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<div class="modal fade" id="event" tabindex="-1" aria-labelledby="event" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="text-align: center;">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="event">Add Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action='/changeprof' method='post' enctype='multipart/form-data'>
          @csrf
          <div class="modal-body">
            <input class="form-control mt-1" type='text' name="event_title" placeholder="Event title">
            <textarea class="form-control mt-1" name="event_description" placeholder="Some description about the event..."></textarea>
            <input class="form-control mt-1" type='date' name="event_date" placeholder="Time">
            <input class="form-control mt-1" type='time' name="event_time" placeholder="Time">
            <input class="form-control mt-1" type='number' name="event_duration" placeholder="Duration in hours">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Change</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection