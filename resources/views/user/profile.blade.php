@section('title', $model->name . 'هرقل ميديا')
@section('description', $model->bio)
@extends('layouts.main')
@section('content')
    <div class="container mt-100">
        <div class="row">
            <div class="col-sm-4">
                <div class="teacher-intro">
                    <img src="https://s3-eu-west-1.amazonaws.com/hangshare-media/{{ $model->image }}" class="img-responsive" alt="">
                    <ul class="social">
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="teacher-full">
                    <h2 class="heading">{{ $model->name }}</h2>
                    <div class="personal">
                        <div>
                            <span>Qualification</span>
                            <span>Masters in Physics</span>
                        </div>
                        <div>
                            <span>Department</span>
                            <span>Atomic Physics</span>
                        </div>
                        <div>
                            <span>Experience</span>
                            <span>6 Years</span>
                        </div>
                    </div>
                    <p>{{ $model->bio }}</p>
                </div>
                <div class="teacher-facts">
                    <div class="fact col-sm-4">
                        <span class="head"><span class="count" data-from="0" data-to="80" data-speed="3000">80</span>Average Score</span>
                    </div>
                    <div class="fact col-sm-4">
                        <span class="head"><span class="count" data-from="0" data-to="94" data-speed="3000">94</span> Students Passed</span>
                    </div>
                    <div class="fact col-sm-4">
                        <span class="head"><span class="count" data-from="0" data-to="20" data-speed="3000">20</span> Scholar Students</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection