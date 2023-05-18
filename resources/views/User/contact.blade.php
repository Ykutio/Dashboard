@extends('user.layouts.main-layout')

@section('title', 'Contact Us')

@section('content')

<main>
    <link href="{{ URL::asset('css/style_contact.css') }}" rel="stylesheet" type="text/css" crossorigin="anonymous">
    <section class="contact" id="contact">
        <div class="container">
            <div class="contact-heading">
                <h3>Contact us</h3>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="contact-grids">
                        <div class=" col-md-6 contact-form">
                            <form action="#" method="post">
                                <input type="text" placeholder="Subject" required=""/>
                                <input type="text" placeholder="Your name" required=""/>
                                <input type="email" placeholder="Your mail" required=""/>
                                <textarea placeholder="Message" required=""></textarea>
                                <div class="submit1"><input type="submit" value="submit"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1775.0505587313571!2d44.96578478336065!3d41.56345909098172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x404406b8dfb2e24d%3A0x449c27b24b39952c!2s2%20Tashkenti%20St%2C%20Rustavi!5e0!3m2!1sru!2sge!4v1683139997661!5m2!1sru!2sge" 
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection