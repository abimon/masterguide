@extends('layouts.app',['title'=>'Events'])
@section('content')
<?php $image= asset('storage/camp.jpg');?>
	<div class="all-title-box" style="background-image:url({{$image}}); background-size:cover; ">
	
	</div>
	
    <div id="pricing-box" class="section wb">
        <div class="container">
			<div class="row">
                @foreach($events as $event)
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <span class="heading">
                                <h3>{{$event->event_title}}</h3>
                            </span>
                            <span class="price-value">Kshs {{$event->charges}}.00<span class="month"> only</span> <span>{{$event->event_date}} </span><span>{{$event->venue}}</span></span>
                        </div>

                        <div class="pricingContent" style="height: 150px; overflow:hidden;">
                            <div style="font-size: small;"><?php html_entity_decode($event['description']);?></div>
                        </div><!-- /  CONTENT BOX-->
                       
                        <div class="pricingTable-sign-up">
                            <a href="/reg/{{$event->event_title}}" class="hover-btn-new orange"><span>sign up</span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
		</div>
    </div><!-- end section -->
@endsection