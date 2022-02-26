<header>
      <nav class="navbar navbar-expand-lg fixed-top bg-white  pt-0">
        <div class="container-fluid headNav">
          <a class="navbar-brand logoImage" href="#">
            <img src="<?php echo base_url('/public/Admin/images/Alba-1.png') ?>" alt="Alba Education" class="img-fluid"/>
          </a>
          <div class="" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center me-3 p-0 m-0">
              <li class="nav-item headerTopIcon">
                <img src="<?php echo base_url('/public/Admin/images/icon1.png') ?>" class="img-fluid" alt="" />
              </li>
              <li class=" nav-item headerTopContent   pe-5">
                <p><?php 
                  $session = session();
                if ($session->has('STUDENT_LOGIN')) {
                  echo $session->get('STUDENT_NAME');
                } ?></p>
                <div class="dropdownMenu2">
                  <ul class="m-0 p-0">
                    <!--<li>-->
                    <!--  <a href="#">Edit Profile</a>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--  <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#resetPassword">Reset Password</a>-->
                    <!--</li>-->
                  </ul>
                </div>
              </li>
               
              <!--<li class="nav-item notificationBell">-->
              <!--  <a href="#">-->
              <!--    <i class="fas fa-bell"></i>-->
              <!--    <span class="notificationNumber">10</span>-->
              <!--  </a>-->
              <!--  <div class="dropdownMenu dropdown-menu-lg ">-->
              <!--    <span class="dropdown-item dropdown-header text-center">15 Notifications</span>-->
              <!--    <div class="dropdown-divider"></div>-->
              <!--    <a href="#" class="dropdown-item">-->
              <!--        Abc 28-07-2021-->
              <!--      <span class="float-end text-muted text-sm">3 mins</span>-->
              <!--    </a>-->
              <!--    <div class="dropdown-divider"></div>-->
              <!--    <a href="#" class="dropdown-item">-->
              <!--      Abc 28-07-2021-->
              <!--      <span class="float-end text-muted ">12 hours</span>-->
              <!--    </a>-->
              <!--    <div class="dropdown-divider"></div>-->
              <!--    <a href="#" class="dropdown-item">-->
              <!--      Abc 28-07-2021-->
              <!--      <span class="float-end text-muted text-sm">2 days</span>-->
              <!--    </a>-->
              <!--    <div class="dropdown-divider"></div>-->
              <!--    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>-->
              <!--  </div>-->
              <!--</li>-->
              <li class="nav-item logOut">
                <a href="<?php echo base_url('student/logout') ?>">
                  <i class="fas fa-sign-in-alt"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- modal for reset password -->
      <div class="modal fade" id="resetPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="resetPasswordLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="resetPasswordLabel">Reset Password</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row g-3 align-items-center">
                <div class="col-auto">
                  <label for="inputEmail6" class="col-form-label">Enter your Email</label>
                </div>
                <div class="col-auto">
                  <input type="email" id="inputEmail6" class="form-control" aria-describedby="passwordHelpInline">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!-- END modal for reset password -->
    </header>
    