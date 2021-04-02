<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{$course->course_name}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet"> -->
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
          <div class="site-logo mr-auto w-25"><a href="/">< Coding Academy/></a></div>
           <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="/" class="nav-link">Home</a></li> 
                 <li><a href="#courses-section" class="nav-link">Courses</a></li>

              </ul>
            </nav>
          </div>
 

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#footer" class="nav-link"><span>Contact Us</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section single-cover" id="home-section">
      
      <div class="slide-1 " style="background-image: url('/{{$course->course_image}}');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row justify-content-center align-items-center text-center">
                

                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-5">

            <div class="mb-5">
              @if(session()->has('apply'))
                <div class="alert alert-info alert-dismissible fade show">
                    {{ session('apply') }}
                    <button type="button" class="close" data-dismiss="alert">x</button>
                </div>
              @endif
              <h3 class="text-black">Course Description</h3>
              <a href="#apply-section" class="btn btn-outline-success">Apply for {{$course->course_name}}</a>
              <p class="mb-4">
                 <div class="meta"><span class="icon-clock-o"></span>Duration: {{$course->duration}}</div>
              </p>
              <p>{{$course->description}}</p>
            </div>

            <div class="pt-5">
              <h3 class="mb-5">{{$countC}} Comments</h3>
              <ul class="comment-list">
                @foreach($comments as $comment)
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="/{{$comment->student->photo}}" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>{{$comment->from_name}}</h3>
                      <div class="meta">{{$comment->created_at}}</div>
                      <p>{{$comment->comment}}</p>
                      <!-- <p><a href="#" class="reply">Reply</a></p> -->
                      @if(Auth::check())
                        <p><a href="{{route('delete_comment', [$comment])}}" class="btn btn-outline-delete">Delete</a></p>
                      @endif
                    </div>
                  </li>
                @endforeach
              <!-- END comment-list -->

              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                
                @if(session()->has('comm'))
                  <div class="alert alert-danger alert-dismissible fade show">
                      {{ session('comm') }}
                      <button type="button" class="close" data-dismiss="alert">x</button>
                  </div>
                @endif
              

                <form method="post" action="{{route('add_comment')}}" class="p-5 bg-light">
                  @csrf
                    <input type="hidden" name="course_id" value="{{$course->id}}">

                  <div class="form-group">
                    <label for="email_c">Email *</label>
                    <input type="email" class="form-control" name="email_c" value="{{old('email_c')}}">
                  </div>
                  @error('email_c')
                    <div class="alert alert-danger">{{$message}} </div>
                  @enderror

                  <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="comment" cols="30" rows="5" class="form-control">{{old('comment')}}</textarea>
                  </div>
                  @error('comment')
                    <div class="alert alert-danger">{{$message}} </div>
                  @enderror

                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>

                </form>
              </div>
            </div>



          </div>
          <div class="col-lg-4 pl-lg-5">

            <div class="mb-5 text-center border rounded course-instructor">
              <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Course Instructor</h3>
              <div class="mb-4 text-center">
                <img src="/{{$course->user->photo}}" alt="Image" class="w-25 rounded-circle mb-4">  
                <h3 class="h5 text-black mb-4">{{$course->user->name}}</h3>
                
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

   
    

    <!-- Apply -->
    <div class="site-section bg-light" id="apply-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <h2 class="section-title mb-3">Apply for {{$course->course_name}}</h2>
            
            <form enctype="multipart/form-data" method="POST" action="{{ route('student_request') }}">
              @csrf
                  <input type="hidden" name="course_id" value="{{$course->id}}">
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

              <label for="photo">Photo</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="photo" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="photo">Choose file</label>
              </div>
              @error('photo')
                <div class="alert alert-danger">{{$message}}</div>
              @enderror

              <div class="form-group row">
                <div class="col-md-6 mt-3">   
                  <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Apply">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  
    
  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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