@extends('layouts.app')

@section('content')

    <section id="showcase">
        <div class="bg-gradient-info showcase-container text-white">
            <div class="container">
                <div class="row d-flex align-items-center">

                    <div class="col-lg-6 text-center text-md-left mb-5 mb-lg-0">
                        <h1 class="section-h1-sm-screen display-4 pt5 font-weight-bold mb-5">Note Taking... <br> Made Easy</h1>
                        <p class="lead">Access your notes on all your devices and share with friends and colleagues</p>
                        @guest
                            <a href="/login" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        @endguest
                        @auth
                            <a href="/notes" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-sign-in-alt"></i> My Notes
                            </a>
                        @endauth

                    </div>

                    <div class="col-lg-6 my-auto">
                        <div class="card text-dark register-card">
                            <div class="card-body">
                                
                                @guest
                                    <form method="POST" action="{{ route('register') }}">
                                        <div class="d-flex flex-column align-items-center">
                                            <h4 class="mb-4 font-weight-bold text-muted">Register for Notely</h4>
                                            
                                            @csrf

                                            <div class="form-group w-75">
                                                <div>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Name">
                    
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group w-75">            
                                                <div>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group w-75">            
                                                <div>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
                    
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group w-75">            
                                                <div>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                                                </div>
                                            </div>
                    
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-success button-showcase">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                @endguest

                                @auth
                                    <div class="text-muted text-center">
                                        <h1 class="font-weight-bold">Hi, <span>{{$user->name}}</span></h1>
                                        <h4>Create a new note...</h4>
                                        <form action="/notes" method="POST">
                                
                                            @csrf
                
                                            <div class="form-group justify-content-center mb-4">
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                            </div>
                
                                            <div class="d-flex justify-content-around">
                                                <button type="submit" class="btn btn-success">New Note</button>
                                            </div>
                                            
                                        </form>
                                    </div>
                                @endauth

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="bg-light text-muted about-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 text-center">
                        <object data="/img/list.svg" type="image/svg+xml" class="img-fluid" width="300" height="300"></object>
                    </div>
                    <div class="col-lg-7 mt-5 mt-lg-0">
                        <h1 class="section-h1-sm-screen display-4 font-weight-bold mb-5">Notely is an online notepad...</h1>
                        <div class="d-flex mb-4 align-items-center">
                            <i class="fas fa-check-circle pr-4"></i>
                            <p class="lead m-0">The ideal solution for web-based note taking and sharing.</p>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <i class="fas fa-check-circle pr-4"></i>
                            <p class="lead m-0">Designed for students and professionals.</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle pr-4"></i>
                            <p class="lead m-0">Fast, responsive, simple and 100% free!</p>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features">
        <div class="bg-gradient-info text-white bg-features">
            <div class="container">
                <div class="pt-4">
                    <h1 class="text-center section-h1-sm-screen display-4 font-weight-bold mb-5">Why use Notely...</h1>
                    <div class="row mx-4">
                        <div class="features-card mb-4 mb-xl-0 col-xl-3 col-md-6 d-flex align-items-stretch text-muted">
                            <div class="card features-box">
                                <div class="icon">
                                    <i class="fab fa-slideshare text-info"></i>
                                </div>
                                <h4 class="font-weight-bold mb-4 text-primary">Share And Colab</h4>
                                <p>Share your notes with friends and co-workers. Friend them in the app to allow them access to your notes</p>
                            </div>
                        </div>
                        <div class="features-card mb-4 mb-xl-0 col-xl-3 col-md-6 d-flex align-items-stretch text-muted">
                            <div class="card features-box">
                                <div class="icon">
                                    <i class="fas fa-universal-access text-info"></i>
                                </div>
                                <h4 class="font-weight-bold mb-4 text-primary">Access Anywhere</h4>
                                <p>Access your notes on any device with an internet connection.</p>
                            </div>
                        </div>
                        <div class="features-card mb-4 mb-xl-0 col-xl-3 col-md-6 d-flex align-items-stretch text-muted">
                            <div class="card features-box">
                                <div class="icon">
                                    <i class="far fa-clipboard text-info"></i>
                                </div>
                                <h4 class="font-weight-bold mb-4 text-primary">Style Your Notes</h4>
                                <p>The built in editor allows you to style your notes and add lists, tables, emojis and even images</p>
                            </div>
                        </div>
                        <div class="features-card mb-4 mb-xl-0 col-xl-3 col-md-6 d-flex align-items-stretch text-muted">
                            <div class="card features-box">
                                <div class="icon">
                                    <i class="fas fa-tachometer-alt text-info"></i>
                                </div>
                                <h4 class="font-weight-bold mb-4 text-primary">Fast and Free</h4>
                                <p>Our easy to use web application is fast and free for all to use.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faq">
        <div class="bg-light text-muted faq-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mt-lg-0 pl-lg-5 mb-5">
                        <div class="faq-description">
                            <h1 class="font-weight-bold display-4 section-h1-sm-screen">Frequently Asked Questions</h1>
                            <p class="lead">Common <span class="font-weight-bold">questions</span> and <span class="font-weight-bold">answers</span>...</p>
                        </div>

                        <div id="accordion">

                            <div class="card mb-2">
                              <div class="card-header bg-white d-flex justify-content-between" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h5 class="mb-0">
                                  <div>
                                    Why am I not seeing the note editor?
                                  </div>
                                </h5>
                                <i class="fas fa-arrow-circle-down ml-2 text-info"></i>
                              </div>
                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    If you are note seeing the note editor when you create a new note simply enter a title, create the note and once created begin editing it. Sometimes the note editor will not show right away due to slow or spotty internet connection
                                </div>
                              </div>
                            </div>

                            <div class="card mb-2">
                              <div class="card-header bg-white d-flex justify-content-between" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h5 class="mb-0">
                                  <div>
                                    How many notes can I create?
                                  </div>
                                </h5>
                                <i class="fas fa-arrow-circle-down text-info"></i>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                  There is no limit to the amount of notes you can create, share or save! This service is completely free for you to use however much you would like. Notes are currently kept indefinitely.
                                </div>
                              </div>
                            </div>

                            <div class="card">
                              <div class="card-header bg-white d-flex justify-content-between" id="headingThree"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h5 class="mb-0">
                                  <div>
                                    Can anyone see my notes?
                                  </div>
                                </h5>
                                <i class="fas fa-arrow-circle-down text-info"></i>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                  NO! In order for someone to see your notes you need to allow them to do so by friending them.
                                </div>
                              </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-5 text-center my-auto">
                        <object data="/img/question.svg" type="image/svg+xml" class="img-fluid" width="300" height="300"></object>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection