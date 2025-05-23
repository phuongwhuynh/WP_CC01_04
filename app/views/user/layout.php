<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MCQ - <?php echo ucfirst($page); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/MCQ/public/css/layout.css">
  <?php
  $cssWebPath = "/MCQ/public/css/$page.css";
  $jsPath = "/MCQ/public/js/$page.js";
  ?>
  <link rel="stylesheet" href="<?php echo $cssWebPath; ?>">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?php echo $jsPath ?>" defer></script>
  <script src="/MCQ/public/js/main.js" defer></script>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand text-primary fw-bold" href="/MCQ/home">iExam</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link <?php echo ($page == 'home') ? 'active' : ''; ?>"
                href="/MCQ/home">Home</a></li>
            <li class="nav-item"><a class="nav-link <?php echo ($page == 'about') ? 'active' : ''; ?>"
                href="about">About</a></li>
            <?php if ($_SESSION['user_role'] === "user"): ?>
              <li class="nav-item"><a class="nav-link <?php echo ($page == 'dashboard') ? 'active' : ''; ?>"
                  href="/MCQ/dashboard">Dashboard</a></li>
            <?php endif; ?>
            <li class="nav-item"><a class="nav-link <?php echo ($page == 'resources') ? 'active' : ''; ?>"
                href="/MCQ/resources">Resources</a></li>
            <li class="nav-item"><a class="nav-link <?php echo ($page == 'contact') ? 'active' : ''; ?>"
                href="/MCQ/contact">Contact</a></li>
          </ul>
          <?php if ($_SESSION['user_role'] === "user"): ?>

            <div class="d-flex justify-content-end me-5 align-items-center ms-3">
              <div class="dropdown">
                <button class="btn dropdown-toggle border-0 bg-transparent p-0" type="button"
                  id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg class="ms-3" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd"
                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                  </svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm p-3" aria-labelledby="userDropdown"
                  style="min-width: 220px;">
                  <li class="mb-2"><span class="fw-semibold">Welcome back,
                      <?php echo $_SESSION['username'] ?? 'User'; ?>!</span></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="/MCQ/history"><i
                        class="bi bi-clock-history me-2"></i>History</a></li>
                </ul>
              </div>
              <button class="btn btn-primary ms-3" onclick="logout()">Logout</button>
            </div>
          <?php else: ?>
            <?php //echo $$_SESSION['user_id'] ?>
            <div class="d-flex justify-content-end me-5">
              <a href="/MCQ/login" class="btn btn-outline-dark ms-2">Login</a>
              <a href="/MCQ/register" class="btn btn-primary ms-3">Get Started</a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </nav>


  </header>


  <main>
    <?php include($content); ?>
  </main>


  <footer class="footer container-fluid mt-5 mb-2">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <!-- <p class="m-0 mt-1">Teacher who do not have a school account (or forgot their password)</p> -->
          <p class="m-0">Please contact the our hotline to receive support</p>
          <br>
          <p class="m-0">Email: minh.phan04@hcmut.edu.vn</p>
          <p class="m-0 mb-1">ĐT (Tel.): (84-8) 0000-0000</p>
        </div>
        <div class="col-sm-4">
          <div class="row" style="height: 100%;">
            <div class="col mt-4 text-center">
              <b class="m-1"><span class="text-dark text-decoration-none">Company</span></b>
              <p class="m-1"><a class="text-dark text-decoration-none" href="/MCQ/about">About
                  us</a></p>
              <p class="m-1"><a class="text-dark text-decoration-none"
                  href="/MCQ/contact">Contact us</a></p>
              <p class="m-1"><a class="text-dark text-decoration-none"
                  href="/MCQ/resources">Resources</a></p>
            </div>
            <?php if ($_SESSION['user_role'] === "guest"): ?>
              <div class="col d-flex flex-column align-items-center p-3">
                <div class="btn-block">
                  <div>
                    <a href="/MCQ/register"
                      class="btn btn-outline-primary m-1 w-100">Register</a>
                  </div>
                  <div>
                    <a href="/MCQ/login" class="btn btn-outline-primary m-1 w-100">Login</a>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <hr class="mx-5">

    <div class="container mt-4 mb-4">
      <div class="row">
        <div class="col-sm-9">
          <p>© iExam 2025</p>
        </div>
        <div class="col-sm-3">
          <div class="">
            <div class="d-flex justify-content-center">
              <p class="my-1">Follow us:</p>
              <div class="btn-group mx-3">
                <a class="mx-2" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="bi bi-facebook" viewBox="0 0 16 16">
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                  </svg>
                </a>
                <a class="mx-2" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="bi bi-twitter-x" viewBox="0 0 16 16">
                    <path
                      d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                  </svg>
                </a>
                <a class="mx-2" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="bi bi-instagram" viewBox="0 0 16 16">
                    <path
                      d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </footer>

</body>

</html>