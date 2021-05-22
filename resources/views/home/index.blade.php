@extends('layouts.app')

@section('content')
<!-- Portfolio Section-->

<section class="page-section portfolio" id="portfolio">

    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">@lang('messages.data_register')</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-graduation-cap"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        @include('util.message')
        <form method="POST" action="{{ route('school.save')}}" class="row justify-content-center">
            <div class="col-md-8">
                @csrf
                <div class="form-group row">
                    <label for="nombre" class="col-md-4 col-form-label text-md-right">@lang('messages.name')</label>
                    <div class="col-md-6">
                        <input type="text" name="nombre" value="{{ old('nombre') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="comuna" class="col-md-4 col-form-label text-md-right">@lang('messages.commune')</label>
                    <div class="col-md-6">
                        <select name="comuna" id="comuna">
                            <option value="1"> 1 </option>
                            <option value="2"> 2 </option>
                            <option value="3"> 3 </option>
                            <option value="4"> 4 </option>
                            <option value="5"> 5 </option>
                            <option value="6"> 6 </option>
                            <option value="7"> 7 </option>
                            <option value="8"> 8 </option>
                            <option value="9"> 9 </option>
                            <option value="10"> 10 </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="carrera" class="col-md-4 col-form-label text-md-right">@lang('messages.career')</label>
                    <div class="col-md-6">
                        <select name="carrera" id="carrera">
                            <option value="Medicina"> @lang('messages.medicine') </option>
                            <option value="Ingenieria"> @lang('messages.engeeniering') </option>
                            <option value="Abogacia"> @lang('messages.advocacy') </option>
                            <option value="Licenciatura"> @lang('messages.degree') </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            @lang('messages.send')
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>


@if (Auth::user()->getRole() == 'admin')
<!-- Send Data To Email Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">@lang('messages.data_mail')</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-at"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        @include('util.mailmessage')
        <!-- About Section Content-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-icon">
                <form method="POST" action="{{ route('mail.stats') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input name="sobre" type="hidden">
                    </div>
                    <button type="submit" id='btn-contact' class="btn text-center text-uppercase text-green" style="background-color: white;">
                        @lang('messages.send')
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endif


@endsection