@extends('user.layouts.main-layout')

@section('title', 'Search result')

@section('content')

<main>
<!--source : http://www.prepbootstrap.com/bootstrap-template/featured-items-->
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">On Your search query :</h1>
        <h1 class="fw-light">{{$search_field}}</h1>
        <p class="lead text-body-secondary">We have result: {{$weapons->total()}}</p>
      </div>
    </div>
  </section>

  <div class="container">
        <div class="row style_featured">
            @foreach($weapons as $weapon)
            <div class="col-md-4">
                <div>
                    <img src="http://www.prepbootstrap.com/Content/images/template/featureditems/product_001.jpg" alt="" class="img-rounded img-thumbnail" />
                    <h2>{{$loop->index+1}}.{{$weapon->name}}</h2>
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