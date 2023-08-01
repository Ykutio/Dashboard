@extends('user.layouts.main-layout')

@section('title', 'Product')

@section('content')

<!--source: http://www.prepbootstrap.com/bootstrap-template/product-details-->
<main>
    <h2 style="text-align: center;">Просмотров этого продукта: {{ $weapon->views }}</h2>
    <div class="container py-md-3 pl-md-5">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row" id="gradient">
                    <div class="col-md-4">
                        <img src="http://www.prepbootstrap.com/Content/images/shared/misc/s7e.png" class="img-responsive">
                    </div>
                </div>
                <div class="row">
                    <div class="tabs_div">
                        <ul>
                            <li>Name</li>
                            <li>Type</li>
                            <li>Description</li>
                            <li>Specification</li>
                            <li>Price</li>
                            <li>Manifacturer Country</li>
                        </ul>
                        <div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="success">Name: </td>
                                        <td>{{$weapon->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="success">Type: </td>
                                        <td>{{$weapon->types_name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="success">Description: </td>
                                        <td>{{$weapon->description}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="success">Specification: </td>
                                        <td>{{$weapon->tacktical_descr}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="success">Price: </td>
                                        <td>{{$weapon->price}} $</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="success">Country: </td>
                                        <td>{{$weapon->country_name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2 style="text-align: center;">Похожие продукты</h2>
    <div class="slideshow-container">       
        @foreach($releatedProducts as $weapon)
        <div class="mySlides">
            <div class="numbertext">{{$loop->index+1}} / 3</div>
            <img src="https://www.prepbootstrap.com/Content/images/template/productslider/product_001.jpg" style="width:100%">
            <div class="text mt-8 md-1">{{ $weapon->name }}</div>
            <div class="row md-4 p-8">                
                <div class="col-md-4 mt-5">
                    <button type="button" class="btn btn-warning position-relative">
                        Add to cart <span class="position-absolute top-10 start-10 translate-middle badge border border-light rounded-circle bg-danger p-2"></span
                    </button>
                </div>
                <div class="col-md-4 offset-md-4 mt-5">
                    <button type="button" class="btn btn-warning position-relative">
                        <a href="{{route('product',$weapon->id)}}">More details</a><span class="position-absolute top-10 start-10 translate-middle badge border border-light rounded-circle bg-danger p-2"></span>
                    </button>
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
    </div>
    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-glow/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

    <script type="text/javascript">
            jQuery(function ($) {
                $(".tabs_div").shieldTabs();
            });
    </script>

    <style>
        .pb-product-details-ul {
            list-style-type: none;
            padding-left: 0;
            color: black;
        }

        .pb-product-details-ul > li {
            padding-bottom: 5px;
            font-size: 15px;
        }

        #gradient {
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#feffff+0,ddf1f9+31,a0d8ef+62 */
            background: #feffff; /* Old browsers */
            background: -moz-linear-gradient(left, #feffff 0%, #ddf1f9 31%, #a0d8ef 62%); /* FF3.6-15 */
            background: -webkit-linear-gradient(left, #feffff 0%,#ddf1f9 31%,#a0d8ef 62%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to right, #feffff 0%,#ddf1f9 31%,#a0d8ef 62%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#feffff', endColorstr='#a0d8ef',GradientType=1 ); /* IE6-9 */
            border: 1px solid #f2f2f2;
            padding: 20px;
        }

        #hits {
            border-right: 1px solid white;
            border-left: 1px solid white;
            vertical-align: middle;
            padding-top: 15px;
            font-size: 17px;
            color: white;
        }

        #fan {
            vertical-align: middle;
            padding-top: 15px;
            font-size: 17px;
            color: white;
        }

        .pb-product-details-fa > span {
            padding-top: 20px;
        }
        /*Bottom SLYDER*/
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

</main>
@endsection