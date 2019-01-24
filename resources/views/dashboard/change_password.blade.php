@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/changePasswordUpdate/'.Auth::user()->id) }}" id="formchange">
                        @csrf

                        <div class="form-group row">
                            <label for="oldpassword" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="oldpassword" type="password" class="form-control{{-- {{ $errors->has('password') ? ' is-invalid' : '' }} --}}" name="oldpassword" required>

                               {{--  @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                    <div class="input-group" name="frmCheckPassword" id="frmCheckPassword">
                                <input id="password" type="password" onkeyup="checkPasswordStrength()" class="form-control pwd{{-- {{ $errors->has('password') ? ' is-invalid' : '' }} --}}" name="password">
{{--                                 @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                                 <div id="password-strength-status"></div>          
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="newpassword">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="btnchange" class="btn btn-primary">
                                    {{ __('Change') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> --}}
{{-- <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.5.5/jquery.validate.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/additional-methods.min.js"></script> --}}
{{-- <script src="{{ asset('metronic/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('metronic/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('metronic/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('metronic/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('metronic/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('metronic/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script> --}}
<script>
     function checkPasswordStrength() {
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        if($('#password').val().length<8) {
        $('#password-strength-status').removeClass();
        $('#password-strength-status').addClass('weak-password');
        $('#password-strength-status').html("Weak (should be atleast 8 characters.)");
        } 
        else 
        { 
        if($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) { 
        $('#password-strength-status').removeClass();
        $('#password-strength-status').addClass('strong-password');
        $('#password-strength-status').html("Strong");
        } 
        else
        {
        $('#password-strength-status').removeClass();
        $('#password-strength-status').addClass('medium-password');
        $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
        }}
    }
    // $(function(){
    jQuery(function ($) {
         var form = $('#formchange');
         $('#formchange').validate({
                rules: {
            oldpassword: {
                required: true,
            //     minlength: 8
            },
            newpassword: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            }
            },
             messages: {
                oldpassword: {
                    required: "Enter your old password"
                 },
                newpassword: {
                    required: "Enter your confirm password",
                    equalTo: "Please same value with new password"
                }
            }
            });
    });
</script>

@endsection
