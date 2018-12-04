
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Podo - Start Together</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://unpkg.com/vue-material@beta/dist/theme/default.css">
    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Po Do</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
            </li>
              <li class="nav-item mx-0 mx-lg-1">
                  <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('todoList') }}">Todo Service</a>
              </li>
              <div id="app">
              <li class="nav-item mx-0 mx-lg-1">
                  <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('card') }}">모집하기</a>
              </li>
            </div>

          </ul>
        </div>
      </div>
            @guest
            <li class="nav-item mx-0 mx-lg-1" >
                <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('login') }}">login</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('register') }}">sign in </a>
            </li>
            @endguest
        @auth
            <li class="nav-item mx-0 mx-lg-1" >

                {{--<a class="nav-link py-3 px-0 px-lg-3" href="{{ route('logout') }}">logout</a>--}}
                <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3" href="{{route('home')}}">my page </a>
            </li>
        @endauth
    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/profile.png" alt="">
        <h1 class="text-uppercase mb-0">Start</h1>
          <hr class="star-light">
        <h2 class="font-weight-light mb-0">내 할일 작성 - 현재 모집중인 팀 목록 - 팀 활동 참여하기</h2>
      </div>
    </header>

    <!-- About Section -->
    <section class="text-black mb-0" id="about">
        <div class="container">
            <h2 class="text-center text-uppercase text-black">About</h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-4 ml-auto">
                    <p class="lead">PODO는 포트폴리오 도메인의 약자로 2018년에 서비스되었으며, KOREATECH 임희성, 이윤수 공동대표가 함께 시작한 굴지의 웹사이트입니다.</p>
                </div>
                <div class="col-lg-4 mr-auto">
                    <p class="lead">PODO에서는 기존의 대외활동 참여에 어려움을 겪었던 사람들을 위해 서비스 되었습니다. 신청자 본인이 함께할 대외활동 멤버를 게시글 작성으로 간편하게 구할수 있습니다. </p>
                </div>
            </div>
            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light" href="/card">
                    <i class="fas fa-download mr-2"></i>
                    Start Now!
                </a>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid Section -->
    <section class="portfolio bg-primary" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">모임 후기</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-1">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/1.jpg" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-2">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/2.jpg" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-3">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/3.jpg" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-4">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/4.jpg" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-5">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/5.jpeg" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-6">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/6.jpeg" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>



    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase mb-0">PODO 개발일정</h2>
          <div class="text-center mt-4">
              <a class="btn btn-xl btn-outline-light" href="/cal">
                  <i class="fas fa-download mr-2"></i>
                  자세히 보기
              </a>
          </div>

          </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Location</h4>
            <p class="lead mb-0">충청남도 천안시 병천면 한국기술교육대학교
              <br><br>임희성 이윤수</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Around the Web</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="http://facebook.com">
                  <i class="fab fa-fw fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="http://google.co.kr">
                  <i class="fab fa-fw fa-google-plus-g"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="http://twitter.com">
                  <i class="fab fa-fw fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://kr.linkedin.com">
                  <i class="fab fa-fw fa-linkedin-in"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://dribbble.com">
                  <i class="fab fa-fw fa-dribbble"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">About Po Do</h4>
            <p class="lead mb-0">Po Do는 신청자 모두가 프로젝트에 참여할 수 있는 사이트입니다.
              <br><a href="http://startbootstrap.com">A.L.L</a></p>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Your Website 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Portfolio Modals -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-1">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/1.jpg" alt="">
              <p class="mb-5">Todo에서 함께 참여한 사람들과 도서관에서 모여서 프로젝트를 진행했습니다. 사람구하기가 쉽지 않을줄 알았는데, 덕분에 빠르게 인원을 모으고 성공적인 프로젝트를 진행했습니다. 사랑해요 연예가중계</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                닫기</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-2">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/2.jpg" alt="">
              <p class="mb-5">성공적인 회의 진행후 가지는 술자리였습니다.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                닫기</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-3">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/3.jpg" alt="">
              <p class="mb-5">조진웅이랑 술마셨다.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                닫기</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-4">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/4.jpg" alt="">
              <p class="mb-5">교환학생들과 대외활동을 하는 기회를 얻게해준 Todo 고맙다.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                닫기</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-5">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/5.jpeg" alt="">
              <h4 class="mb-5">빌 : "우리 거지였을때 기억나?" <br><br> 잡스 : "아니"</h4>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                닫기</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-6">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/6.jpeg" alt="">
              <p class="mb-5">I Love Todo!</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                닫기</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>


</html>
