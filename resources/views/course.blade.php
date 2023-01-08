@extends('layouts.app', ['title'=>'Course'])
@section('content')
<div class="p-4" style="min-height:600px;">
    @foreach($courses as $course)
    <h2 class="d-flex justify-content-center">
        {{$course->course_name}}
    </h2>

    <div class="">
        @foreach($notes as $note)
        <h4 class="card-title alert alert-success">{{$note->chapter}}</h4>
        <div>
            <?php echo htmlspecialchars_decode($note->objectives); ?>
        </div>
        <div>
            <?php echo htmlspecialchars_decode($note->content); ?>
        </div>
        @guest
        @else
        @if((Auth()->user())&&(Auth()->user()->role=='Instructor')||(Auth()->user()->role=='Director'))
        <div class="d-flex justify-content-end m-2">
            <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#contentUpdate{{$note->id}}" aria-expanded="false" aria-controls="collapse">
                Update {{$note->chapter}}
            </button>
        </div>
        <div class="collapse" id="contentUpdate{{$note->id}}">
            <div class="card card-body">
                <form action="/updateContent" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="note_id" value="{{$note->id}}">
                    <div class="form-floating mt-1">
                        <select name="category" id="" class="form-control">
                            <option value="{{$note->chapter}}">{{$note->chapter}}</option>
                            <option value="Chapter 1">Chapter 1</option>
                            <option value="Chapter 2">Chapter 2</option>
                            <option value="Chapter 3">Chapter 3</option>
                            <option value="Chapter 4">Chapter 4</option>
                            <option value="Chapter 5">Chapter 5</option>
                            <option value="Chapter 6">Chapter 6</option>
                            <option value="Chapter 7">Chapter 7</option>
                            <option value="Chapter 8">Chapter 8</option>
                            <option value="Chapter 9">Chapter 9</option>
                            <option value="Chapter 10">Chapter 10</option>
                            <option value="Assignment 1">Assignment 1</option>
                            <option value="Assignment 2">Assignment 2</option>
                            <option value="Test">Test</option>
                        </select>
                        <label for="floatingInput">Course Chapter</label>
                    </div>
                    <div class="form-floating mt-1">
                        <textarea name="body" class="form-control body">{{$note->content}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger m-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success m-1">Update</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        @endguest
        @endforeach

        <hr>
    </div>

    <p class="d-flex justify-content-between">
        <a href='/notes/{{$course->course_name}}'>
            <button class="btn btn-primary" type="button">
                Download PDF
            </button>
        </a>
        @guest
        @else
        @if((Auth()->user())&&(Auth()->user()->role=='Instructor')||(Auth()->user()->role=='Director'))
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#contentAdd" aria-expanded="false" aria-controls="collapseExample">
            Add Content
        </button>
        @endif
        @endguest
    </p>

    <div class="collapse" id="contentAdd">
        <div class="card card-body">
            <form action="/addContent" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="course_id" value="{{$course->id}}">
                <div class="form-floating mt-1">
                    <select name="category" id="" class="form-control">
                        <option value="Chapter 1">Chapter 1</option>
                        <option value="Chapter 2">Chapter 2</option>
                        <option value="Chapter 3">Chapter 3</option>
                        <option value="Chapter 4">Chapter 4</option>
                        <option value="Chapter 5">Chapter 5</option>
                        <option value="Chapter 6">Chapter 6</option>
                        <option value="Chapter 7">Chapter 7</option>
                        <option value="Chapter 8">Chapter 8</option>
                        <option value="Chapter 9">Chapter 9</option>
                        <option value="Chapter 10">Chapter 10</option>
                        <option value="Assignment 1">Assignment 1</option>
                        <option value="Assignment 2">Assignment 2</option>
                        <option value="Test">Test</option>
                    </select>
                    <label for="floatingInput">Course Chapter</label>
                </div>
                <label for="floatingInput">
                    <h4>Content</h4>
                </label>
                <div class="form-floating mt-1">
                    <textarea name="body" class="form-control body" placeholder="Course requirements..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger m-1" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success m-1">Upload</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <h4>Share</h4>
    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_email"></a>
        <a class="a2a_button_sms"></a>
    </div>
    @endforeach

</div>
<!-- AddToAny BEGIN -->
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
<script>
    CKEDITOR.replaceAll('body')
</script>
@endsection