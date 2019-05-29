@extends('wave::layout.default')
@section('layout.body.class', 'app flex-row align-items-center')
@section('layout.body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-group">
                <div class="card p-4">
                    <div class="text-center"><img src="/assets/wave/images/logo_small.png"></div>
                    <div class="card-body">
                        <p class="text-muted text-center">Sign in to Laraning Wave</p>
                        <form method="POST" action="{{ route('wave.login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            @error($errors, 'email')
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            @error($errors, 'password')
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-4">Login</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <small class="text-center text-primary">Copyright {{ date('Y') }} Laraning. All rights reserved.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- No footer rendered in the login page. --}}
@section('layout.footer', '')

@pushonce('scripts.additional')
<script type="text/javascript">
    $(function(){
        var form  = $("form");
        var firstInput = $(":input:not(input[type=button],input[type=submit],button):visible:first", form);
        firstInput.focus();
      });
</script>
@endpushonce