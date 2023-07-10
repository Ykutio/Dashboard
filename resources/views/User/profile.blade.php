@extends('user.layouts.main-layout')

@section('title', 'Profile')

@section('content')

<div class="text-secondary bg-dark text-center">
    @if(isset($logged_inn_user))
    <h1>Здраствуйте {{$user_all_page->name}} !!!</h1>
</div>

<!--FORM-->
<div class="button mb-4 mt-4 text-center"><h2>Обновите ваши данные</h2></div>
<form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="name">Введите ваше имя</label>
        <input type="text" name="name" placeholder="Имя" id="name" class="form-control" value="{{$user->name}}" required="">
    </div>
    <div class="form-group">
        <label for="surname">Введите вашу фамилию</label>
        <input type="text" name="surname" placeholder="Фамилия" id="surname" class="form-control" value="{{$user->surname}}" required="">
    </div>
    <div class="form-group">
        <div class="mb-4 mt-4">
            <img src="{{asset($user->image)}}" width="10%" alt="аватарка">
        </div>
        <label for="user_image">Выберите картинку/фотографию на ваш аватар</label>
        <input type="file" name="image" placeholder="Портрет" id="image" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Введите ваш электронный адрес</label>
        <input type="text" name="email" placeholder="E-mail" id="country" class="form-control" value="{{$user->email}}" >
    </div>
    <div class="form-group">
        <label for="telephone">Введите ваш телефонный номер</label>
        <input type="text" name="telephone" placeholder="Телефон" id="telephone" class="form-control" value="{{$user->telephone}}" >
    </div>
    <div class="form-group">
        <label for="adress">Введите ваш адрес</label>
        <input type="text" name="adress" placeholder="Адрес" id="adress" class="form-control" value="{{$user->adress}}" >
    </div>
    <div class="form-group">
        <label for="card_bank">Укажите ваш банк : Liberty Bank /TBC Bank/Georgian Bank</label>
        <input type="text" name="card_bank" placeholder="Банк" id="card_bank" class="form-control" value="{{$user->card_bank}}" >
    </div>
    <div class="form-group">
        <label for="card_number">Введите цифры вашей банковской карты</label>
        <input type="text" name="card_number" placeholder="Цифры карты" id="card_number" class="form-control" value="{{$user->card_number}}" >
    </div>
    <div class="container text-center"><h4 class="mb-3">Если вы хотите обновить пороль</h4></div>
    <div class="form-group">
        <label for="password">Введите новый ваш пароль</label>
        <input type="text" name="password" placeholder="Пароль" id="password" class="form-control" value="" >
    </div>
    <div class="form-group">
        <label for="password_confirmation">Подтвердите ваш новый пароль</label>
        <input type="text" name="password_confirmation" placeholder="Пароль" id="password_confirmation" class="form-control" value="" >
    </div>
</div>  
<div class="button mb-4 mt-4 text-center">
    <a href="{{route('user.update',$user->id)}}"><button type="submit" class="btn btn-outline-success">Обновить</button></a>
</form>
</div>
@else
<div class="text-secondary bg-dark text-center"><h1>Какое-то сообщение ERROR что вы не в системе</h1></div>
@endif
@endsection