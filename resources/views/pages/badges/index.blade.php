@extends('layouts.main')
@section('title')
Badges
@endsection
@section('content')
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail badge_image">
            <img src="{{URL::asset('asset/images/services/1s.png')}}" alt="...">
            <div class="caption">
                <h3>Freshmen</h3>
                <p>When user is registered and rating up to 20 points</p>

            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail badge_image">
            <img src="{{URL::asset('asset/images/services/2s.png')}}" alt="...">
            <div class="caption">
                <h3> Semi-pro</h3>
                <p>When users rating is less than 51 & more than 21 points</p>

            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail badge_image">
            <img src="{{URL::asset('asset/images/services/3s.png')}}" alt="...">
            <div class="caption">
                <h3>Professional</h3>
                <p>When users rating is less than 201 & more than 51 points</p>

            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail badge_image">
            <img src="{{URL::asset('asset/images/services/4k.png')}}" alt="...">
            <div class="caption">
                <h3>Guru</h3>
                <p>When users rating is less than 401 & more than 201 points</p>

            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail badge_image">
            <img src="{{URL::asset('asset/images/services/premium.png')}}" alt="...">
            <div class="caption">
                <h3>Legend</h3>
                <p>When users rating is more than 401 points</p>

            </div>
        </div>
    </div>


@endsection