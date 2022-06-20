@extends('studentDashboard.layout.main')

@section('content')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<section class="account">
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <h2>Student</h2>
                        <p><strong>About: </strong> Web Designer / UI. </p>
                        <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new things. </p>
                        <p><strong>Skills: </strong>
                            <span class="tags">html5</span>
                            <span class="tags">css3</span>
                            <span class="tags">jquery</span>
                            <span class="tags">bootstrap3</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-center">
                        <figure>
                            <img src="/assets/img/team/team-3.jpg" alt="" class="img-circle img-responsive">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection