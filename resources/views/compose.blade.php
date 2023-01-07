@extends('layouts.index2',['title'=>'Compose'])
@section('dashboard')
<!-- ### $App Screen Content ### -->
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-12">
              <form class="">
                <h4 class="c-grey-900 mB-20">Send Message</h4>
                <div class="send-header">
                  <div class="form-group">
                    <input type="text" class='form-control' placeholder="To">
                  </div>
                  <div class="form-group">
                    <input type="text" class='form-control' placeholder="CC">
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Email Subject">
                  </div>
                  <div class="form-group">
                    <textarea name="compose" class="form-control" placeholder="Say Hi..." rows='10'></textarea>
                  </div>
                </div>
                <div id="compose-area"></div>
                <div class="text-right mrg-top-30">
                  <button class="btn btn-danger">Send</button>
                </div>
              </form>
           
        </div>
      </div>
    </div>
  </div>
</main>
@endsection