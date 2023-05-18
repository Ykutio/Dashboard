@extends('user.layouts.main-layout')

@section('title', 'Registration')

@section('content')

<main>
<section>
    <div class="container">

        <div class="alert alert-warning text-center my-4">
            Looking for a more detailed example? Checkout the <a href="https://bootstrapcreative.com/shop/bootstrap-4-toolkit/" target="_blank">Bootstrap 4 Templates Kit</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                <div class="row">
                    <div class="col text-center">
                        <h1>Register</h1>
                        <p class="text-h3">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. </p>
                    </div>
                </div>
                <form action="{{route('user.store')}}" method="post" class="form">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row align-items-center">
                        <div class="col mt-4">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col mt-4">
                            <input type="text" class="form-control" name="surname" placeholder="Surname">
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="col">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="row justify-content-start mt-4">
                        <div class="col">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" required="checkbox">
                                    I Read and Accept <a href="https://policies.google.com/terms?hl=en">Terms and Conditions</a>
                                </label>
                            </div>
                            <button class="btn btn-primary mt-4">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>

</style>

<script type="text/javascript">

</script>
</main>
@endsection