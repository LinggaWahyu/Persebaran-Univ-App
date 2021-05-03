@extends('layouts.app')

@section('content')
<section class="page-content mt-5">
      <div class="page-login mt-5">
        <div class="container mt-5">
          <div class="row mt-5">
            <div class="col-8 justify-content-center text-center mt-5">
              <img
                src="{{ asset('Frontend/images/login-image.png') }}"
                alt="Login Imagae"
                width="500px"
              />
            </div>
            <div class="col-4 mt-5 pt-5">
              <div class="login-card">
                <div class="card">
                  <div class="card-body text-center">
                    <h4><b>Login Admin Cari Univ App</b></h4>
                    <br />
                    <form action="{{ route('login') }}" method="POST" class="text-left">
                        @csrf
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input
                          type="email"
                          name="email"
                          id="email"
                          class="form-control"
                        />
                        <small id="emailHelp" class="form-text text-muted"
                          >Masukkan email admin anda.</small
                        >
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input
                          type="password"
                          class="form-control"
                          id="password"
                          name="password"
                        />
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <button
                        type="submit"
                        class="btn btn-primary btn-block mt-4"
                      >
                        Login
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
