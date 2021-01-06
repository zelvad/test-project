@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Добавление заявки</div>
                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success" role="alert">{!! \Session::get('success') !!}</div>
                    @endif
                    <form method="POST" action="{{ route('create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя</label>
                            <input type="text" class="form-control" name="name" placeholder="Введите Ваше имя" value="{{ old('name') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback" style="display: block">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Введите email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback" style="display: block">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Телефон</label>
                            <input type="text" class="form-control" name="phone" placeholder="Введите ваш телефон" value="{{ old('phone') }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback" style="display: block">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
