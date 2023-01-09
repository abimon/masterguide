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

          <ul class="m-0 p-0 mT-20">
            <li>
              <a class="td-n p-20 peers fxw-nw mR-20 peer-greed c-grey-900" href="" data-toggle="modal" data-target="#calendar-edit">
                <button type="button" class="mT-nv-50 pos-a r-10 t-2 btn cur-p bdrs-50p p-0 w-3r h-3r btn-warning">
                  <i class=" bi bi-plus "></i>
                </button>
              </a>

            </li>
            @foreach($events as $event)
            <li class="bdB peers ai-c jc-sb fxw-nw">
              <a class="td-n p-20 peers fxw-nw mR-20 peer-greed c-grey-900" href="" data-toggle="modal" data-target="#calendar-details{{$event->id}}">
                <div class="peer mR-15">
                  <i class="fa fa-fw fa-clock-o c-red-500"></i>
                </div>
                <div class="peer">
                  <span class="fw-600">{{$event->event_title}}</span>
                  <div class="c-grey-600">
                    <span class="c-grey-700">{{$event->event_duration}}hr(s) on {{$event->event_date}}</span>

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
            <div class="modal fade" id="calendar-details{{$event->id}}">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="bd p-15">
                    <h5 class="m-0">{{$event->event_title}}</h5>
                  </div>
                  <div class="modal-body">
                    <div class="d-flex justify-content-between">
                      <div><i class="bi bi-calendar"></i> {{$event->event_date}}</div>
                      <div><i class="bi bi-clock"></i> {{$event->event_duration}}hour(s) from {{$event->event_time}}</div>
                    </div>
                    <p>{{$event->event_description}}</p>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteEvent{{$event->id}}"><i class="bi bi-trash"></i> Delete</button></a>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#editEvent{{$event->id}}"><i class="bi bi-pencil"></i> Edit</button></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="editEvent{{$event->id}}">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="bd p-15">
                    <h5 class="m-0">Add Event</h5>
                  </div>
                  <div class="modal-body">
                    <form action="/editEvent/{{$event->id}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label class="fw-500">Event title</label>
                        <input type='text' class="form-control bdc-grey-200" value={{$event->event_title}} name="event_title">
                      </div>
                      <div class="form-group">
                        <label class="fw-500">Event Date</label>
                        <input type="date" class="form-control bdc-grey-200" value={{$event->event_date}} name="event_date">
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label class="fw-500">Start Time</label>
                          <div class="timepicker-input input-icon form-group">
                            <div class="input-group">
                              <input type="time" class="form-control bdc-grey-200 start-date" value={{$event->event_time}} name="event_time">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="fw-500">Duration</label>
                          <div class="timepicker-input input-icon form-group">
                            <div class="input-group">
                              <input type="number" class="form-control bdc-grey-200 end-date" value={{$event->event_duration}} name="event_duration">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="fw-500">Event Description</label>
                        <textarea class="form-control bdc-grey-200" rows='5' name="event_description" >{{$event->event_description}}</textarea>
                      </div>
                      <div class="text-right">
                        <button class="btn btn-primary cur-p" type="submit">Done</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="deleteEvent{{$event->id}}">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="bd p-15">
                    <h5 class="m-0">Add Event</h5>
                  </div>
                  <div class="modal-body">
                    Are you sure to delete this event?
                      <div class="modal-footer">
                      <a href="/deleteEvent/{{$event->id}}"><button class="btn btn-danger cur-p" type="submit">Yes</button></a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
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
              <form action="/addEvent" method="post">
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
                  <label class="fw-500">Event Description</label>
                  <textarea class="form-control bdc-grey-200" rows='5' name="event_description"></textarea>
                </div>
                <div class="text-right">
                  <button class="btn btn-primary cur-p" type="submit">Done</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

@endsection