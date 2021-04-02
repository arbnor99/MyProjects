<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Code Academy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ url('/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ url('/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{ url('/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{ url('/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{ url('/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{ url('/css/aos.css')}}">

    <link rel="stylesheet" href="{{ url('css/style.css')}}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="{{route('index')}}">< Coding Academy/></a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Home</a></li> 
                <li><a href="#programs-section" class="nav-link">About Us</a></li>
                <li><a href="#courses-section" class="nav-link">Courses</a></li>
                <li><a href="#teachers-section" class="nav-link">Teachers</a></li>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="" class="nav-link " data-toggle="modal" data-target="#login">Login</a>
                            <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                      <li><a href="#register-section" class="nav-link">Register</a></li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right d-lg">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                        </div>
                    </li>
                @endguest
                    
              </ul>
              
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#footer " class="nav-link"><span>Contact Us</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <!-- LOG IN -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-left">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Log In</h5>
					<button type="button" class="close w-25 h-100" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{route('login')}}" class="p-5 mb-5">
            @csrf
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" style="width: 100%" aria-describedby="emailHelpId" placeholder="" value="{{old('email')}}">
						</div>
            @error('email')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror

						<div class="form-group pb-4">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" style="width: 100%" aria-describedby="emailHelpId" placeholder="">
						</div>
            @error('password')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="form-group pb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember me</label>
              </div>
						</div>
						<button class="btn btn-outline-primary btn-block" type="submit" name="login">Log In</button>
					</form>
				</div>
			</div>
		</div>
	</div>
  <!-- END OF LOG IN -->

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Learn From The Expert</h1>
                </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div class="site-section" id="programs-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">About Us</h2>
            <p>Coding Academy founded 2016 in Prishtina, with a focus on providing professional training in Information Technology. Code Academy is  expanding training programs and other activities for  professional  training in the field of information technology</p>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
          
          </div>
          </div>
        </div>

      </div>
    </div>
    
    <div class="site-section courses-title" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Courses</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">
              <!-- COURSES -->
              @foreach($courses as $course)
                <div class="course bg-white h-100 align-self-stretch">
                  <figure class="m-0">
                    <a href="{{route('view_course', [$course])}}"><img src="/{{$course->course_image}}" alt="Image" class="img-fluid"></a>
                  </figure>
                  <div class="course-inner-text py-4 px-4">
                    <span class="course-price">{{$course->price}} €</span>
                    <h3 style="text-align: center;"><a href="{{route('view_course', [$course])}}">{{$course->course_name}}</a></h3>
                    <img style="width: 50px;height: 50px; margin-left: 120px;border-radius: 30px;" src="/{{$course->user->photo}}">
                    <h2 style="font-size: 15px;text-align: center;">{{$course->user->name}}</h2>
                  </div>
                  <div class="d-flex border-top stats">
                    <div class="py-3 px-4"><span class="icon-users"></span> {{$course->nr_students}} students</div>
                    <div class="py-3 px-4 w-25 ml-auto "></div>
                  </div>
                </div> 
              @endforeach  
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-7 text-center">
            <button class="customPrevBtn btn btn-primary m-1">Prev</button>
            <button class="customNextBtn btn btn-primary m-1">Next</button>
          </div>
        </div>
      </div>
    </div>



    <!-- TEACHERS -->
    <div class="site-section" id="teachers-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Our Teachers</h2>
           
          </div>
        </div>

        <div class="row">
          @foreach($users as $user)
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
              <div class="teacher text-center">
                <img src="/{{$user->photo}}" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
                <div class="py-2">
                  <h3 class="text-black">{{$user->name}} </h3>
                  <p class="position">
                    @foreach($user->courses as $course)
                      {{$course->course_name}}
                    @endforeach
                  </p>
                  <p>{{$user->experience}}</p>
                </div>
              </div>
            </div>
          @endforeach
      </div>
    </div>
    

    <div class="site-section bg-image overlay" style="background-image: url('images/Logo.jpg');">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-8 text-center testimony">
            <h1 style="color: white;">Story of the success</h1>
            <br>
            <img src="images/foto2.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
            <h3 class="mb-4">Agon Gashnjani</h3>
            <blockquote>
              <p><b>Agon has finished successfully training OOP PHP & MySQL.Now he is for the intership as backend in Starlabs company in Prishtina</p>
            </blockquote>
            
          </div>
        </div>
      </div>
    </div>

    <div class="site-section pb-0">

      <div class="future-blobs">
        <div class="blob_2">
          <img src="images/blob_2.svg" alt="Image">
        </div>
        <div class="blob_1">
          <img src="images/blob_1.svg" alt="Image">
        </div>
      </div>
      <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
          <div class="col-lg-7 text-center">
            <h2 class="section-title">Why Chose Us</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

            <div class="p-4 rounded bg-white why-choose-us-box">

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                 <div><h3 class="m-0">600 students graduate this year</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-work"></span></span></div>
               <div><h3 class="m-0">40% of students are employed</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Top Professionals in The World</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Expand Your Knowledge</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Best Online Teaching Assistant Courses</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Best Teachers</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-work"></span></span></div>
                <div><h3 class="m-0">Complicity with big company</h3></div>
              </div>

            </div>
</div>
          <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
            <img src="images/person_transparent.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

          </div>
          

          </div>
        </div>
      </div>
    </div> <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
          <div class="col-lg-7 text-center">
            <h2 class="section-title">Our Partners </h2>
          </div>
        </div>
            <img src="images/gjirafa.jpg" alt="Image" class="img-fluid">
            <img style="margin-left: 40px;" src="images/STAR.JPG" alt="Image" class="img-fluid">
           <img style="margin-left: 20px;" src="images/CISCO.png" alt="Image" class="img-fluid">

          </div>
        </div>
      </div>
    </div>
          </div>
          

          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light" id="register-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <h2 class="section-title mb-3">Apply for teacher</h2>
            
            <form id="reggi" enctype="multipart/form-data" method="POST" action="{{ route('register_request') }}">
              @csrf
              <div class="form-group row">
                <div class="col-md-6 mb-3 mb-lg-0">
                </div>
                <div class="col-md-6">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" name="firstname" class="form-control" placeholder="FirstName" value="{{old('firstname')}}">
                </div>
              </div>
              @error('firstname')
                <div class="alert alert-danger">{{$message}} </div>
              @enderror

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" name="lastname" class="form-control" placeholder="LastName" value="{{old('lastname')}}">
                </div>
              </div>
              @error('lastname')
                <div class="alert alert-danger">{{$message}} </div>
              @enderror

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="experience" id="" cols="63" rows="5" placeholder="Your experience...">{{old('experience')}}</textarea>
                </div>
              </div>
              @error('experience')
                <div class="alert alert-danger">{{$message}} </div>
              @enderror

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" name="contact" class="form-control" placeholder="Contact" value="{{old('contact')}}">
                </div>
              </div>
              @error('contact')
                <div class="alert alert-danger">{{$message}} </div>
              @enderror

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                </div>
              </div>
              @error('email')
                <div class="alert alert-danger">{{$message}} </div>
              @enderror

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
              </div>
              @error('password')
                <div class="alert alert-danger">{{$message}} </div>
              @enderror

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="photo" class="form-label">Photo</label>
                  <input class="form-control" type="file" name="photo">
                </div>
              </div>
              @error('photo')
                <div class="alert alert-danger">{{$message}}</div>
              @enderror

              <div class="form-group row">
                <div class="col-md-6 mt-3">   
                  <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Register">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    
     
    <footer class="footer-section bg-light" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
         <img style="width:width: 40px;height: 40px;margin-left:20px;" src="images/phone.png">
         <br>
       <br>
         <p style="font-weight: bold;">044111222</p>
        
         
          </div>

          <div class="col-md-3 ml-auto">
          <img style="width: 40px;height: 40px; margin-left: 70px;" src="images/location.png">
           <br>
        <br>
         <p style="font-weight: bold;">Bekim Berisha,Prishtine,Kosovë</p>

            </ul>
          </div>

          <div class="col-md-3 ml-auto">
                   <img style="width: 40px;height: 40px;margin-left: 70px;" src="images/mail.jpg">
           <br>
         <br>
         
         <p style="font-weight: bold;">info@codingacademy.com</p>
            </ul>
          </div>
              </div>
            </form>
          </div>
        </div>
      </footer>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  
    
  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.    min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
  
  </body>
</html>