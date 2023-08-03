@extends('user.layouts.main-layout')

@section('title', 'Products')

@section('content')

<style>
    * {box-sizing: border-box}
    body {font-family: Verdana, sans-serif; margin:0}
    .mySlides {display: none}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
        max-width: 35%;
        position: relative;
        margin: auto;
    }

    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: green;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
        color: #717171;
        font-size: 30px;
        padding: 28px 12px;
        position: absolute;
        bottom: 4px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/4 etc) */
    .numbertext {
        color: #717171;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {opacity: .7} 
        to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
    }
</style>
</head>
<body>
<h2 style="text-align: center;">Самые просматриваемые продукты</h2>
    <div class="slideshow-container">       
        @foreach($weaponsForSlyder as $weapon)
        <div class="mySlides">
            <div class="numbertext">{{$loop->index+1}} / 5</div>
            <img src="https://www.prepbootstrap.com/Content/images/template/productslider/product_001.jpg" style="width:100%">
            <div class="text">{{ $weapon->name }}</div>
            <div class="row md-4 p-8">
                <div class="col-md-4">
                    <i class="fa fa-shopping-cart"></i><a href="#">Add to cart</a>
                </div>
                <div class="col-md-4 offset-md-4">
                    <i class="fa fa-list"></i><a href="{{route('product',$weapon->id)}}">More details</a>
                </div>
            </div>
        </div>
        @endforeach

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
        <span class="dot" onclick="currentSlide(4)"></span> 
        <span class="dot" onclick="currentSlide(5)"></span> 
    </div>

    <!--CONTENT_START-->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="container">
                <div class="row style_featured">
                    <?php
                    //Dla korrektnoi numeracii produkcii po stranicam
                    $i = 1;
                    if ($weapons->currentPage() !== 1) {
                        $i = ($weapons->currentPage() - 1) * $weapons->perPage()
                                + 1;
                    }
                    ?>
                    @foreach($weapons as $weapon)
                    @php
                    $number = $loop->index+1;
                    if($weapons->currentPage() > 1)
                    {
                    $number =  $weapons->perPage()*($weapons->currentPage()-1) + $number;
                    }
                    @endphp
                    <div class="col-md-4">
                        <div>
                            <img src="http://www.prepbootstrap.com/Content/images/template/featureditems/product_001.jpg" alt="" class="img-rounded img-thumbnail" />
                            <h2>{{ $i++ }}-{{$number}}.{{$weapon->name}}</h2>
                            <p style="text-align: left;">
                                <span class="fa fa-info-circle"></span>
                                {{$weapon->tacktical_descr}}
                            </p>
                            <a href="{{route('product',$weapon->id)}}" class="btn btn-success" title="More">More »</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <style>
                .style_featured{
                    padding: 20px 0;
                    text-align: center;
                }
                .style_featured > div > div{
                    padding: 10px;
                    border: 1px solid transparent;
                    border-radius: 4px;
                    transition: 0.5s;
                }
                .style_featured > div:hover > div{
                    margin-top: +19px;
                    border: 1px solid rgb(153, 200, 250);
                    box-shadow: rgba(0, 0, 0, 0.1) 0px 9px 9px 9px;
                    background: rgba(153, 200, 250, 0.1);
                    transition: 0.99s;
                }
            </style>

        </div>
    </div>
     <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <h6 class="display-6">
                {{$weapons->links('vendor.pagination.default')}}
            </h6>
        </ul>
    </nav>
</body>
</html>
@endsection