<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.html"><img src="<?php echo base_url('/public/Admin/img/Alba4.png') ?>" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content adminNav ">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item ">
                            <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fab fa-sith"></i><span>Site Manager</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminUploadPost'); ?>" class="nav-link"><i class="fas fa-angle-right"></i>Upload Post</a>
                                </li>

                                <!-- youtube api will be used for videos  -->
                                <!-- <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminUploadVideo'); ?>" class="nav-link"><i class="fas fa-angle-right"></i>Upload Video</a> 
                                </li> -->
                                
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminUploadImages'); ?>" class="nav-link"><i class="fas fa-angle-right"></i>Upload Images</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="/adminUploadWorkbook.html" class="nav-link"><i class="fas fa-angle-right"></i>Upload Workbook</a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminNewletter'); ?>" class="nav-link"><i class="fas fa-angle-right"></i>Newsletter</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminEvents'); ?>" class="nav-link"><i class="fas fa-angle-right"></i>Events</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/assignmentHelp'); ?>" class="nav-link"><i class="fas fa-angle-right"></i>Assignment Help</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminRegularPlan') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Regular Plan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminWeeklyPlan') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Weekly Plan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminMonthlyPlan') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Monthly Plan</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-folder-plus"></i><span>Manage</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/add_subjects') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Add Subjects</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-user-graduate"></i><span>Students</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminAllStudents') ?>" class="nav-link"><i class="fas fa-angle-right"></i>All Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminStudentRegisration'); ?>" class="nav-link"><i class="fas fa-angle-right"></i>Enroll Student</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/assignSubjectsStudents'); ?>" class="nav-link"><i class="fas fa-angle-right"></i>Assign more subjects</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminStudentPromotion') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Student Promotion</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin//adminStudentCertification') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Certificates</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin///adminStudentNotification') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Notifications</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-users"></i><span>Teachers</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminAllTeacher'); ?>" class="nav-link"><i class="fas fa-angle-right"></i>All Teachers</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminTeacherRegistration') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Add New Teacher</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/assignSubjectsTeacher') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Assign more Subjects</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminViewResume')?>" class="nav-link"><i class="fas fa-angle-right"></i>View Resume</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminAuditReport')?>" class="nav-link"><i class="fas fa-angle-right"></i>Audit Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminWarning') ?>/" class="nav-link"><i class="fas fa-angle-right"></i>Warning</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/adminLiveClasses') ?>" class="nav-link"><i class="fas fa-book-reader"></i><span>Live Classes</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/adminSessionHistory') ?>" class="nav-link"><i class="fas fa-history"></i><span>Session History</span></a>
                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="far fa-list-alt"></i><span>Attendence</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminAttendenceStudent') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Student</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminAttendenceTeacher') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Teacher</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-book"></i><span>Curriculum</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminCurriculumStudent') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Student</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminCurriculumTeacher') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Teacher</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-file-invoice"></i><span>Account</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/adminStudentBilling') ?>/" class="nav-link"><i class="fas fa-angle-right"></i>Student Billing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin//adminTeacherBilling') ?>" class="nav-link"><i class="fas fa-angle-right"></i>Teacher Billing</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/adminViewRequest') ?>" class="nav-link"><i class="fab fa-rev"></i><span>View Requests</span></a>
                        </li>
                    </ul>
                </div>
            </div>