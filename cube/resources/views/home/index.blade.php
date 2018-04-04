@layout('layouts/main')

@section('navigation')
@parent
<li><a href="/about">About</a></li>
@endsection

@section('content')
<div class="hero-unit">
    <div class="row">
        <div class="span6">
            <h1>Welcome to Adrian's Cube!</h1>
            <p>Cube is an orders management system</p>
            <p>Track orders as it goes through its lifecycle</p>
            <p>Put notes and tasks to help with its management</p>
            <p><a href="about" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
        </div>

        <div class="span4">
            <img src="http://nettuts.s3.amazonaws.com/2064_laravel/img/phones.png" alt="Instapics!" />
        </div>
    </div>

</div>

<!-- Example row of columns -->
<div class="row">
    <div class="span3">
        &nbsp;
    </div>
    <div class="span4">
        <a href="#"><img src="http://nettuts.s3.amazonaws.com/2064_laravel/img/badge_ios.png" alt="Get it on iOS" /></a>
    </div>
    <div class="span4">
        <a href="#"><img src="http://nettuts.s3.amazonaws.com/2064_laravel/img/badge_android.png" alt="Get it on Android" /></a>
    </div>
</div>
@endsection
