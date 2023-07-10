@extends('user.layouts.main-layout')

@section('title', 'Products')

@section('content')

<main>
    <!--source : http://www.prepbootstrap.com/bootstrap-template/featured-items-->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album example</h1>
                <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            @dump(request()->input('page'))
            @dump(request())
            <!--@dump(get_class_methods($weapons))-->
            @dump($weapons->currentPage())
            @dump($weapons->perPage())<!--9-->
            <div class="container">
                <div class="row style_featured">
                    <?php
                    $i = 1;
                    if ($weapons->currentPage() !== 1) {
                        $i = ($weapons->currentPage() - 1) * $weapons->perPage() + 1;
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

</main>
@endsection