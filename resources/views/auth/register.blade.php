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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- 성별 -->
                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('성별') }}</label>
                            <div class="col-md-6">
                                <input type="radio" id="radio1" name="radios" value="all" checked>
                                <label for="radio1">남자</label>
                                <input type="radio" id="radio2" name="radios"value="false">
                                <label for="radio2">여자</label>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        {{--관심분야--}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('관심분야') }}</label>

                                <div class="row clearfix" style="margin-left: 1px">
                                    <div class="col-md-12 column">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <thead>
                                            <tr>
                                                <th class="text-center form-control">
                                                    관심분야 입력
                                                </th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr id='addr0'>

                                                <td>
                                                    <input type="text" name='name[]'  placeholder='Enter Full Name' class="form-control">
                                                </td>

                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                        </div>
                        <div style="text-align: center ">
                            <button id="add_row" class="btn" >Add Row</button>
                            <button id='delete_row' class=" btn" >Delete Row</button>
                        </div>
                        <!-- 나이 -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" >
                            </div>

                        </div>

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
