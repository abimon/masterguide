@extends('layouts.app',['title'=>'Events'])
@section('content')
<?php $image= asset('storage/camp.jpg');?>
	<div class="all-title-box" style="background-image:url({{$image}}); background-size:cover; ">
	
	</div>
	
    <div id="pricing-box" class="section wb">
        <div class="container">
			<div class="row d-flex justify-content-center">
                @foreach($events as $event)
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <span class="heading">
                                <h3>{{$event->event_title}}</h3>
                            </span>
                            <span class="price-value">Kshs {{$event->charges}}.00<span class="month"> only</span> <span>{{$event->event_date}} </span><span>{{$event->venue}}</span></span>
                        </div>

                        <div class="pricingContent p-2" style="height: 150px; overflow:hidden;">
                            <div><?php echo html_entity_decode($event['event_description']);?></div>
                        </div><!-- /  CONTENT BOX-->
                       
                        <div class="pricingTable-sign-up">
                            <a href="/reg/{{$event->event_title}}" class="hover-btn-new orange"><span>sign up</span></a>
                            @if(Auth()->user() && Auth()->user()->role!='Member')
                            <a href="/attend/{{$event->event_title}}" class="hover-btn-new orange"><span>Registered</span></a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
		</div>
    </div><!-- end section -->
@endsection