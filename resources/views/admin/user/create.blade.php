@extends('layouts.admin.app')

@section('title')
    Create User
@endsection

@section('header')
    Create User
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('admin.user.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Prefix : </label>
                        <div class="col-md-6">
                            <select name="prefix" class="form-control @error('prefix') is-invalid @enderror">
                                @foreach ($prefixes as $key => $item)
                                    @if ($key == 0)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                        <div class="col-md-6">
                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror"
                                name="fname" value="{{ old('fname') }}" autofocus>

                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                        <div class="col-md-6">
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"
                                name="lname" value="{{ old('lname') }}" autofocus>

                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" 
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                 autocomplete="new-password">
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label for="user-type-select" class="col-md-4 col-form-label text-md-right">User Type</label>

                        <div class="col-md-6">
                            <select name="type" class="form-control">
                                @foreach ($types as $item)
                                    @if ($item->type == 0)
                                        <option value="{{ $item->type }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->type }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="container">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">??????????????????</button>
                            <a href="{{ URL::to('admin/user') }}" class="btn btn-ligth">????????????</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // function setInputFilter(textbox, inputFilter) {
            //     ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(
            //         function(event) {
            //             textbox.addEventListener(event, function() {
            //                 if (inputFilter(this.value)) {
            //                     this.oldValue = this.value;
            //                     this.oldSelectionStart = this.selectionStart;
            //                     this.oldSelectionEnd = this.selectionEnd;
            //                 } else if (this.hasOwnProperty("oldValue")) {
            //                     this.value = this.oldValue;
            //                     this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            //                 } else {
            //                     this.value = "";
            //                 }
            //             });
            //         });
            // }

            // setInputFilter(document.getElementById("username"), function(value) {
            //     return /^\d*$/.test(value);
            // });

            // var input = document.getElementById('username');
            // input.addEventListener('input',function(){
            //     if(input.value.length === 9){
            //         input.value += '-';
            //     }
            // });
        });

    </script>
@endpush
