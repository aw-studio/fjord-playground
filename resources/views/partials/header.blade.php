<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">Fjord Playground</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
          <li><a href="/projects">Projects</a></li>
          <li><a href="#portfolio">Departments</a></li>
          <li class="{{ Request::is('team') ? 'active' : '' }}"><a href="/team">Team</a></li>
          <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="/admin">Login</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->