@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ-นามสกุล') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DateofBirth" class="col-md-4 col-form-label text-md-right">{{ __('วันเดือนปีเกิด') }}</label>

                            <div class="col-md-6">
                                <input id="DateofBirth" type="date" class="form-control @error('DateofBirth') is-invalid @enderror" name="DateofBirth" value="{{ old('DateofBirth') }}" required autocomplete="DateofBirth" autofocus>

                                @error('DateofBirth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="SEX" class="col-md-4 col-form-label text-md-right">{{ __('เพศ') }}</label>
                            <div class="col-md-6">
                            <select  class="custom-select @error('SEX') is-invalid @enderror" name='SEX' required id="SEX" value="{{ old('SEX') }}" required autocomplete="SEX" autofocus>
                              <option value="" >เลือกเพศ</option>
                              <option value="M">ชาย</option>
                              <option value="F">หญิง</option>
                            </select>
                            </div>
                            @error('SEX')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                          </div>
                     

                        <div class="form-group row">
                            <label for="Tel" class="col-md-4 col-form-label text-md-right">{{ __('เบอร์โทรศัพท์') }}</label>

                            <div class="col-md-6">
                                <input id="Tel" type="text" class="form-control @error('Tel') is-invalid @enderror" name="Tel" value="{{ old('Tel') }}" required autocomplete="Tel" autofocus>

                                @error('Tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                            <a href="{{url('/')}}/login/facebook" class="btn btn-primary btn-block">
                            <i class="fa fa-facebook"></i>&nbsp; Register with Facebook
                            </a>
                            
                            <hr>
                            <a href="{{url('/redirect')}}" class="btn btn-danger btn-block"><i class="fa fa-google">
                            </i> Register with Google
                            </a>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
