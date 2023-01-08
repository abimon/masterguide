<div style="text-align: end;"><i >{{date('d-m-Y')}} Update</i></div>
<hr>
<div style='text-align:center;'>
    <img src="{{asset('storage/images/logo.png')}}" alt="" width="120">
    <p>The University Master Guide</p>
</div>
<div class="p-4">
    <h1 style="text-align: center;">
        {{$course->course_name}}
    </h1>
    
    <div class="">
        @foreach($notes as $note)
        <div>
            <h3 style="color:#155724;background-color:#d4edda;border-color:#c3e6cb;  position:relative;padding:.75rem 1.25rem;margin-bottom:1rem;border:1px solid transparent;border-radius:9px; padding:5px;">
                {{$note->chapter}}
            </h3>
        </div>
        <div>
            <?php echo htmlspecialchars_decode($note->content); ?>
        </div>
        @endforeach
        <hr>
    </div>
    <p>&copy; 2022 - {{date('Y')}} TheuniversityMasterGuide. All Rights Reserved.</p>
</div>