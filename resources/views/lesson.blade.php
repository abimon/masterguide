@extends('layouts.index2',['title'=>'Lessons'])
@section('dashboard')
<!-- ### $App Screen Content ### -->
<div class="col-md-12">
    <!-- #posts Report ==================== -->
    <div class="bd bgc-white">
        <div class="layers" id="members">
            <div class="layer w-100">
                <div class="bgc-light-blue-500 c-white p-20">
                    <div class="peers ai-c jc-sb gap-40">
                        <div class="peer peer-greed">
                            <h5>{{date('F Y')}}</h5>
                            <p class="mB-0">Lessons</p>
                        </div>
                        <div class="peer">
                            <h3 class="text-right text-light">{{$lessons->count()}}</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-center">
                        @foreach($lessons as $lesson)
                        <div class="col-md-5 col-9 m-1">
                            <div class="card p-4">
                                <h3 class="text-uppercase d-flex justify-content-center">{{$lesson->title}}</h3>
                                <div class="d-flex justify-content-between">
                                    <div class="text-info">{{$lesson->facilitator}}</div>
                                    <div class="text-primary">{{date_format(date_create($lesson->date), 'F jS, Y')}}</div>
                                </div>
                                <hr>
                                <h5>Objectives</h5>
                                <div><?php echo html_entity_decode($lesson['objectives']); ?></div>
                                <hr>
                                <h5>Comments</h5>
                                <hr>
                                <div><?php echo html_entity_decode($lesson['Comments']); ?></div>
                                @if(((Auth()->user()->role=='Director')&&(Auth()->user()->institution=$lesson->institution))||(Auth()->user()->role=='Coordinator'))
                                <button class="btn btn-outline-info" data-bs-target="#CommentLesson{{$lesson->id}}" data-bs-toggle="modal">Comment</button>
                                <button data-bs-target="#EditLesson{{$lesson->id}}" data-bs-toggle="modal">Edit</button>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="EditLesson{{$lesson->id}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="bd p-15">
                                        <h5 class="m-0">Edit Lesson</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/updateLesson/{{$lesson->id}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="fw-500">Lesson title</label>
                                                <input type='text' class="form-control bdc-grey-200" name="title" value="{{$lesson->title}}">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fw-500">Date</label>
                                                        <input type="date" class="form-control bdc-grey-200" name="date" value={{$lesson->date}}>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fw-500">Facilitator</label>
                                                        <input type="text" class="form-control bdc-grey-200 end-date" name="facilitator" value="{{$lesson->facilitator}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-500">Lesson Objectives</label>
                                                <textarea class="form-control bdc-grey-200" rows='5' id="objectives" name="objectives">{{$lesson->objectives}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-500">Lesson Comments</label>
                                                <textarea class="form-control bdc-grey-200" rows='5' id="post" name="comments">{{$lesson->comments}}</textarea>
                                            </div>
                                            <div class="text-right">
                                                <button class="btn btn-outline-primary cur-p" type="submit">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="Comment{{$lesson->id}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="bd p-15">
                                        <h5 class="m-0">Comment Lesson</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/commentLesson/{{$lesson->id}}" method="post">
                                            @csrf
                                            <div class="form-group">Lesson title: {{$lesson->title}}</div>
                                            <div class="row">
                                                <div class="col-md-6">Date: {{date_format(date_create($lesson->date), 'F jS, Y')}}</div>
                                                <div class="col-md-6">Facilitator: {{$lesson->facilitator}}</div>
                                            </div>
                                            <h5>Objectives</h5>
                                            <div class="form-group"><?php echo html_entity_decode($lesson['objectives']) ?></div>
                                            <div class="form-group">
                                                <label class="fw-500">Lesson Comments</label>
                                                <textarea class="form-control bdc-grey-200" rows='5' id="objectives" name="comments">{{$lesson->comments}}</textarea>
                                            </div>
                                            <div class="text-right">
                                                <button class="btn btn-primary cur-p" type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection