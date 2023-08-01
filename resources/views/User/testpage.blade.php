@extends('user.layouts.main-layout')

@section('title', 'Cart')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/foundation/5.0.2/css/foundation.css'>
<link rel="stylesheet" href="css/style_carts.css">
<script>

</script>
<div class="row">
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1><a href="#">LocalCart //</a></h1>
            </li>
        </ul>
        <section class="top-bar-section">
            <ul class="left">
                <li><a href="#">made for you &hearts;</a>
                </li>
            </ul>
        </section>
    </nav>
    <div class="medium-4  columns">
        <div class="cart">
            <h1>Cart items</h1>
            <div class="row">
                <div class="medium-6 columns">
                    <button class="tiny secondary" id="clear">Clear the cart</button>
                </div>
                <div class="medium-6 columns">
                    <button class="tiny disabled" title="Work in progress">Checkout</button>
                </div>
            </div>
            <div id="cartItems">Loading cart...</div>
            Total price: <strong id="totalPrice">0 $</strong>
        </div>

    </div>
    <div class="medium-8 columns">
        <h1>Some products</h1>
        <div class="products">
            <div class="product medium-4 columns" data-name="Orange" data-price="12" data-id="0">
                <img src="images/orange.png" alt="Orange" />
                <h3>Orange</h3>
                <input type="text" class="count" value="1" />
                <button class="tiny">Add to cart</button>
            </div>
            <div class="product medium-4 columns" data-name="Apple" data-price="10" data-id="1">
                <img src="images/apple.jpg" alt="Apple" />
                <h3>Apple</h3>
                <input type="text" class="count" value="1" />
                <button class="tiny">Add to cart</button>
            </div>
            <div class="product medium-4 columns" data-name="Peach" data-price="20" data-id="2">
                <img src="images/peach.jpg"alt="Peach" />
                <h3>Peach</h3>
                <input type="text" class="count" value="1" />
                <button class="tiny">Add to cart</button>
            </div>
        </div>
    </div>
</div>
<script type="text/template" id="cartT">
            <% _.each(items, function (item) { %> <div class = "panel"> <h3> <%= item.name %> </h3>  <span class="            label">
                    <%= item.count %> piece<% if(item.count > 1)
    {%>s
    <%}%> for <%= item.total %>$</span > </div>
    <% }); %>
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js'></script>
<script  src="js/script.js"></script>
                    @endsection