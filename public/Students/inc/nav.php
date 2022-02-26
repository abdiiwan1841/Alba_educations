<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 bg-PureWhite">
            <nav class="mainNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="<?php

use App\Controllers\FrontEnd\Student;

echo base_url('student/dashboard') ?>" class="nav-link linkHover">
                    <i class="far fa-folder iconHover"></i>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('student/curriculum') ?>" class="nav-link linkHover">
                    <i class="fas fa-calendar-alt iconHover"></i>
                    Curriculum
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('student/liveClasses') ?>" class="nav-link linkHover">
                    <i class="far fa-file iconHover"></i>
                    Live Classes
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('student/attendence') ?>" class="nav-link linkHover">
                    <i class="far fa-edit iconHover"></i>
                    Attendence
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('student/sessionHistory') ?>" class="nav-link linkHover">
                    <i class="fas fa-cogs iconHover"></i>
                    Session History
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('/student/homework'); ?>" class="nav-link linkHover">
                    <i class="fas fa-pencil-alt iconHover"></i>
                    HomeWork
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('/student/quiz'); ?>" class="nav-link linkHover">
                    <i class="far fa-file-alt iconHover"></i>
                    Quiz
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('/student/testTestResults'); ?>" class="nav-link linkHover">
                    <i class="fas fa-poll iconHover"></i>
                    Test/ Test results
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('/student/reportCard'); ?>" class="nav-link linkHover">
                    <i class="far fa-address-card iconHover"></i>
                    Report card
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="perfomance.html" class="nav-link linkHover">
                    <i class="fas fa-sort-amount-up-alt iconHover"></i>
                    Performance
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="<?php echo base_url('/student/certificates'); ?>" class="nav-link linkHover">
                    <i class="fas fa-certificate iconHover"></i>
                    Certificates
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('/student/billing'); ?>" class="nav-link linkHover">
                    <i class="fas fa-file-invoice iconHover"></i>
                    Billing
                  </a>
                </li>
                
              </ul>
            </nav>
          </div>