@extends('user.layouts.main-layout')

@section('title', 'Product')

@section('content')

<!--source: http://www.prepbootstrap.com/bootstrap-template/product-details-->
<main>
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
    </style>

</main>
@endsection