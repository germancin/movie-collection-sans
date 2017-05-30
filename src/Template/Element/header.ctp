<header role="banner" class="navbar navbar-inverse">
    <div class="container">    
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">German Movie Manager</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/movies">Movies</a></li>
                <?php if (!$isLoggin):?>
                	<li><a href="/users/login">Login</a></li>
                <?php else: ?>
                	<li><a href="/users/logout">Logout - Hi, <?=$userAuth['username']?></a></li>
                <?php endif; ?>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
    </div>
</header>