@extends('frontend.layouts.header')
@section('content')
    <div class="intro-section" id="{{$Beranda->slug}}-section">
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Learn From The Expert</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa nulla sed quis rerum amet natus quas necessitatibus.</p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="/register" class="btn btn-primary py-3 px-5 btn-pill">Daftar Sekarang</a></p>

                </div>
                {{dd(Auth::guard('admin'))}}
                @if (Auth::guard('admin'))
                   <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                    <div class="form-box">
                    <h3 class="h4 text-black mb-4">Halo, </h3>
                        <a href="{{route('manage.home')}}" class="btn btn-success btn-pill">Dashboard</a>
                        <a href="{{route('manage.logout')}}" class="btn btn-danger btn-pill">Logout</a>
                    </div>
                </div>
                @else
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                    @if ($message = Session::get('info'))
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <form method="POST" action="{{ route("manage.login") }}" class="form-box" novalidate>
                    @csrf
                    <h3 class="h4 text-black mb-4">Login</h3>
                    <div class="form-group">
                      <input type="text" name="email" class="form-control" placeholder="Email Addresss">
                        @if ($errors->has('email'))
                        <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="Login">
                    </div>
                  </form>

                </div>
                @endif
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

@include('frontend.study')

@include('frontend.whyus')

@include('frontend.contact')

@include('frontend.footer')


@endsection

