<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/">Fjord Playground</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
          <li class="{{ Request::is('projects') ? 'active' : '' }}"><a href="/projects">Projects</a></li>
          <!--<li><a href="/departments">Departments</a></li>-->
          <li class="{{ Request::is('team') ? 'active' : '' }}"><a href="/team">Team</a></li>
          <li><a href="https://www.fjord-admin.com" target="_blank">Documentation</a></li>
        </ul>
      </nav>
      
      <a href="/admin" class="get-started-btn scrollto">Login</a>
    </div>
  </header>