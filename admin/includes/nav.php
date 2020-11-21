<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <button class="btn btn-dark border-info" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo htmlentities(  $login_session_name);?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <form method="post" enctype="multipart/form-data">
                <button class="dropdown-item" name="logout" >Logout</button>
                </form>
              </div>
            </li>
          </ul>
        </div>
      </nav>