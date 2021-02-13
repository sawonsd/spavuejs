@extends('layouts.app')

@section('content')

<div class="login">

    <img class="logo" src="{{asset('assets/img/logo.png')}}" alt="">
    <h1>Login</h1>

        <form method="POST" action="{{ route('login') }}">
                @csrf

               

                

            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">


            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

            <button type="submit" class="btn btn-primary btn-block btn-large">Log In</button>

            @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
         </form>
</div>


@endsection
