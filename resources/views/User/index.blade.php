@extends('user.layouts.main-layout')

@section('title', 'Home')

@section('content')

<!--CONTAINER-->
<!--        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>-->
<!--END of CONTAINER-->
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" align="center">
        <header class="mb-auto">
            <div class="text-secondary bg-dark">
                <?php
                echo "<h2>" . date("d-m-Y H:i:s") . "</h2>";
                $hour = (int) strftime( '%H' );
                //$hour = (int)date("H"); //Так тоже можно
                $welcome = '';
                if ( $hour > 0 and $hour < 6 )
                {
                    $welcome = "Доброй ночи ";
                } elseif ( $hour >= 6 and $hour < 12 )
                {
                    $welcome = "Доброе утро ";
                } elseif ( $hour >= 12 and $hour < 18 )
                {
                    $welcome = "Добрый день ";
                } elseif ( $hour >= 18 and $hour < 23 )
                {
                    $welcome = "Добрый вечер ";
                } else
                {
                    $welcome = "Доброй ночи ";
                }             
                ?>
                @if($user)
                <h1><?php echo $welcome; ?> {{$user->name}} !!!</h1>
                @else
                <h3><?php echo $welcome; ?> гость. Вы не авторизированны</h3>
                @endif
            </div>
        </header>
    </div>
<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">Разновидности / типы нашего арсенала</h5>
        <div class="row">
            @foreach($types as $type)
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p>
                                        <img class=" img-fluid" alt="Team Cards Flipper" src="{{$type->image}}" /></p>
                                    <h4 class="card-title">{{$type->name}}</h4>
                                    <!--<p class="card-text">The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>-->
                                    <!--<a href="#" class="btn btn-primary btn-sm">Далее</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Описание</h4>
                                    <p class="card-text">{{$type->description}}</p>
                                    <a href="{{route('products',$type->id.'_'.str_slug($type->name,'_'))}}" class="btn btn-dark">Далее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .btn-primary:hover,
    .btn-primary:focus
    {
        background-color: #108d6f;
        border-color: #108d6f;
        box-shadow: none;
        outline: none;
    }

    .btn-primary
    {
        color: #fff;
        background-color: #305891;
        border-color: #305893;
    }

    section
    {
        padding: 60px 0;
    }

        section .section-title
        {
            text-align: center;
            color: #305893;
            margin-bottom: 50px;
            text-transform: uppercase;
        }

    #team .card
    {
        border: none;
        background: #ffffff;
    }

    .image-flip:hover .backside,
    .image-flip.hover .backside
    {
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
        -o-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        transform: rotateY(0deg);
        border-radius: .25rem;
    }

    .image-flip:hover .frontside,
    .image-flip.hover .frontside
    {
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -o-transform: rotateY(180deg);
        transform: rotateY(180deg);
    }

    .mainflip
    {
        -webkit-transition: 1s;
        -webkit-transform-style: preserve-3d;
        -ms-transition: 1s;
        -moz-transition: 1s;
        -moz-transform: perspective(1000px);
        -moz-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        transition: 1s;
        transform-style: preserve-3d;
        position: relative;
    }

    .frontside
    {
        position: relative;
        -webkit-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        z-index: 2;
        margin-bottom: 30px;
    }

    .backside
    {
        position: absolute;
        top: 0;
        left: 0;
        background: white;
        -webkit-transform: rotateY(-180deg);
        -moz-transform: rotateY(-180deg);
        -o-transform: rotateY(-180deg);
        -ms-transform: rotateY(-180deg);
        transform: rotateY(-180deg);
        -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    }

    .frontside,
    .backside
    {
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transition: 1s;
        -webkit-transform-style: preserve-3d;
        -moz-transition: 1s;
        -moz-transform-style: preserve-3d;
        -o-transition: 1s;
        -o-transform-style: preserve-3d;
        -ms-transition: 1s;
        -ms-transform-style: preserve-3d;
        transition: 1s;
        transform-style: preserve-3d;
    }

        .frontside .card,
        .backside .card
        {
            min-height: 312px;
        }

            .backside .card a
            {
                font-size: 18px;
                color: #305893 !important;
            }

            .frontside .card .card-title,
            .backside .card .card-title
            {
                color: #305893 !important;
            }

            .frontside .card .card-body img
            {
                width: 200px;
                height: 200px;
                border-radius: 50%;
            }
</style>

@endsection