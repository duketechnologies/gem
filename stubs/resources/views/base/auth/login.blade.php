@extends('admin.base.layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-4">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1 class="mb-5">{{ 'Вход' }}</h1>
                        <form action="{{ route('admin.login.store') }}" method="POST">
                            @csrf

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-envelope"></i>
                                </span>
                                </div>
                                <input class="form-control" type="email" name="email" placeholder="{{ 'Email' }}" required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-unlock"></i>
                                </span>
                                </div>
                                <input class="form-control" type="password" name="password" placeholder="{{ 'Пароль' }}" required>
                            </div>
                            <div class="form-group">
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> {{ 'Запомнить меня' }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" type="submit">{{ 'Войти' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
