<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

//main 
// home page -----------
$routes->get('/', 'FrontEnd/Home::index');
$routes->get('/Home', 'FrontEnd/Home::index');

// about us page -------
$routes->get('/aboutUs_albaEducations','FrontEnd/AboutUs_albaEducations::index');

// aboutUs_facilitators
$routes->get('/aboutUs_facilitators','FrontEnd/AboutUs_facilitators::index');
//aboutUs_contact
$routes->get('/aboutUs_contact','FrontEnd/AboutUs_contact::index');
// gallery
$routes->get('/gallery','FrontEnd/Gallery::index');
// gallery_videos
$routes->get('/gallery_videos','FrontEnd/Gallery::gallery_videos');


// studyMaterial_courses
$routes->get('/studyMaterial_courses','FrontEnd/StudyMaterial_courses::index');
// studyMaterial_customizedWorkBook
$routes->get('/studyMaterial_customizedWorkBook','FrontEnd/StudyMaterial_customizedWorkBook::index');
// studyMaterial_bookYourDemo
$routes->get('/studyMaterial_bookYourDemo','FrontEnd/StudyMaterial_bookYourDemo::index');
// studyMaterial_tutorHiringProcess
$routes->get('/studyMaterial_tutorHiringProcess','FrontEnd/StudyMaterial_tutorHiringProcess::index');

// regular plan
$routes->get('/studyMaterial_regularPlan','FrontEnd/StudyMaterial::regular_plan');
$routes->post('/regular_plan','FrontEnd/StudyMaterial::regular_plan_submit');
$routes->post('/successRegularPlan','FrontEnd/StudyMaterial::successRegularPlan');

// weekly plan
$routes->get('/studyMaterial_weeklyPlan','FrontEnd/StudyMaterial::weekly_plan');
$routes->post('/weekly_plan','FrontEnd/StudyMaterial::weekly_plan_submit');
$routes->post('/successWeeklyPlan','FrontEnd/StudyMaterial::successWeeklyPlan');

//MOnthly 
$routes->get('/studyMaterial_monthlyPlan','FrontEnd/StudyMaterial::studyMaterial_monthlyPlan');
$routes->post('/monthly_plan','FrontEnd/StudyMaterial::monthly_plan');
$routes->post('/successMonthlyPlan','FrontEnd/StudyMaterial::successMonthlyPlan');

// book_your_demo
$routes->post('/book_your_demo','FrontEnd/StudyMaterial::book_your_demo');

// subscribe_updates
$routes->post('/subscribe_updates','FrontEnd/Home::subscribe_updates');



// -----------------------------------------> 
// events_timeManagementWorkshop
$routes->get('/events_timeManagementWorkshop','FrontEnd/events_timeManagementWorkshop::index');

//parentSupport_parentCounselling
$routes->get('/parentSupport_parentCounselling','FrontEnd/ParentSupport_parentCounselling::index');
// parentSupport_webinar
$routes->get('/parentSupport_webinar','FrontEnd/ParentSupport_webinar::index');
//event
$routes->get('/event','FrontEnd/Event::index');

//blog
$routes->get('/blog','FrontEnd/Blog::index');
//newsletter submit
$routes->post('/subscribe_newsletter','FrontEnd/Home::subscribe_newsletter');
// assignmentHelp
$routes->get('/assignmentHelp','FrontEnd/Assignments::index');
// assignment_help_submittion
$routes->post('/assignment_help_submittion','FrontEnd/Assignments::assignment_help_submittion');
// submit_parent_counseling_form
$routes->post('submit_parent_counseling_form','FrontEnd/Parents::submit_parent_counseling_forms');
//submit resume
$routes->post('submittResume','Admin/Teachers::submittResumes');

// termsAndConditions
$routes->get('/termsAndConditions','FrontEnd/Home::termsAndConditions');

// privacyPolicy
$routes->get('/privacyPolicy','FrontEnd/Home::privacyPolicy');



//student login
$routes->get('/login','FrontEnd/Student::login_page');
//student login request
$routes->post('/student_login','FrontEnd/Student::student_login');


//teacher login
$routes->get('/teacher_login','FrontEnd/Teacher::login_page');
//student login request
$routes->post('/teacher_requestLogin','FrontEnd/Teacher::teacher_login');


//adminlogin
$routes->get('/wp-admin','FrontEnd/Admin_login::admin_login_page');
// adminlogin request 
$routes->post('/admin_login','FrontEnd/Admin_login::admin_login');

//students
$routes->group('/student', ['filter'=>'StudentLoggedIn'], function($routes){
$routes->get('', 'Student/Dashboard::Dashboard_page');
	$routes->get('dashboard', 'Student/Dashboard::Dashboard_page');
	// curriculum
	$routes->get('curriculum', 'Student/Curriculum::Curriculum_page');
	// liveClasses
	$routes->get('liveClasses', 'Student/LiveClasses::LiveClasses_page');
	// attendence
	$routes->get('attendence', 'Student/Attendence::attendence_page');
	
	// homeworks
	$routes->get('homework', 'Student/Homework::homework_page');
	//submit homework
	$routes->post('submit_homework', 'Student/Homework::submit_homework');
	
	// sessionHistory
	$routes->get('sessionHistory', 'Student/Sessions::sessionHistory_page');
	
	
	$routes->get('adminUploadPost','Admin/Blogs::adminUploadPost');
	// $routes->get('logout', 'FrontEnd/Admin_login::admin_logout');
	
	// billing
	$routes->get('billing', 'Student/Billing::student_billing');
	// pay-fee	
	$routes->get('pay-fee', 'Student/Billing::student_pay_bill');
	// paymentStatus
	$routes->post('paymentStatus', 'Student/Billing::paymentStatus');
	
	// quiz
	$routes->get('quiz', 'Student/Quiz::quiz_page');
	
	// submit_quiz
	$routes->post('submit_quiz', 'Student/Quiz::submit_quiz');


	// testTestResults
	$routes->get('testTestResults', 'Student/Quiz::testTestResults');
	// reportCard
	$routes->get('reportCard', 'Student/Quiz::reportCard');

	// certificates
	$routes->get('certificates', 'Student/Quiz::certificates');

	// get_report
	$routes->get('get_report/(:num)','Student/Quiz::get_report');


	// logout
	$routes->get('logout', 'FrontEnd/Student::student_logout');

	// reschedule_class
	$routes->post('reschedule_class', 'Student/Reschedule::reschedule_class');
	// teacher_feedback
	$routes->post('teacher_feedback', 'Student/Feedback::teacher_feedback');
	

});

//teachers
$routes->group('/teacher', ['filter'=>'TeacherLoggedIn'], function($routes){
// 	$routes->get('', function(){ return view('Teacher/Dashboard');});
// 	$routes->get('dashboard', function(){ return view('Teacher/Dashboard');});
	

	$routes->post('request_certificate', 'Teacher/Certification::request_certificate');
		
	$routes->get('dashboard', 'Teacher/Dashboard::dashboard_page');
	$routes->get('', 'Teacher/Dashboard::dashboard_page');


	 $routes->get('logout', 'FrontEnd/Admin_login::teacher_logout');
		
	// teacherTodaySession
	$routes->get('teacherTodaySession', 'Teacher/Sessions::teacherTodaySession_page');
	//submit remark after attendance
	$routes->post('remarks_afterSession', 'Teacher/Sessions::student_attendance');
	
	// curriculum
	$routes->get('teacherCurriculum', 'Teacher/Curriculum::Curriculum_page');
	// request curriculum
	$routes->post('request_change_curriculum', 'Teacher/Curriculum::request_curriculum');
	
	//homework
	$routes->get('teacherHomework', 'Teacher/Homework::Homework_page');
	$routes->post('upload_homework', 'Teacher/Homework::homework_submit');

	// teacherQuiz
	$routes->get('teacherQuiz', 'Teacher/Quiz::teacherQuiz');
	
	// teacherTestResults
	$routes->get('teacherTestResults', 'Teacher/Quiz::teacherTestResults');

	// teacherCertification
	$routes->get('teacherCertification', 'Teacher/Certification::teacherCertification');

	// teacherAddQuiz
	$routes->post('teacherAddQuiz', 'Teacher/Quiz::teacherAddQuiz');
	
	// teacherStudyMaterial
	$routes->get('teacherStudyMaterial', 'Teacher/Certification::teacherStudyMaterial');
	
	// teacherAuditReport
	$routes->get('teacherAuditReport', 'Teacher/Certification::teacherAuditReport');
	$routes->post('audit_reply', 'Teacher/Certification::audit_reply');
	

	// teacherBilling	
	$routes->get('teacherBilling', 'Teacher/Billing::teacherBilling');

	// teacherProfileDetails
	$routes->get('teacherProfileDetails', 'Teacher/Billing::teacherProfileDetails');




	// adminRequestQuiz
	$routes->get('adminRequestQuiz','Teacher/Quiz::adminRequestQuiz');
	// create_quiz
	$routes->post('create_quiz','Teacher/Quiz::create_quiz');
	// quiz_make_live
	$routes->get('quiz_make_live/(:num)','Teacher/Quiz::quiz_make_live');

	// adminAddQuiz
	$routes->get('adminAddQuiz','Teacher/Quiz::adminAddQuiz');
	// add_new_question	
	$routes->post('add_new_question','Teacher/Quiz::add_new_question');

	
	// quiz_delete
	$routes->get('quiz_delete/(:num)','Teacher/Quiz::quiz_delete');
	
	// upload_study_materials
    $routes->post('upload_study_materials','Teacher/Study_materials::upload_study_materials');


	//tests 
	$routes->post('upload_tests', 'Teacher/Tests::upload_tests');
	


	// logout
});


// admin pages 
$routes->group('/admin', ['filter'=>'adminLoggedIn'], function($routes){
	$routes->get('', 'Admin/Blogs::Dashboard_page');
	$routes->get('dashboard', 'Admin/Blogs::Dashboard_page');
	$routes->get('logout', 'FrontEnd/Admin_login::admin_logout');
	
    // 	adminEvents
	$routes->get('adminEvents','Admin/Blogs::adminEvents');
    // 	add_new_event
	$routes->post('add_new_event', 'Admin/Blogs::add_new_event');
    // remove_event
    $routes->get('remove_event/(:num)', 'Admin/Blogs::remove_event');
    
	$routes->get('adminUploadPost','Admin/Blogs::adminUploadPost');
	$routes->post('add_new_post', 'Admin/Blogs::add_new_blog');
	// 	remove_post
	$routes->get('remove_post/(:num)', 'Admin/Blogs::remove_post');
// 	remove_image
	$routes->get('remove_image/(:num)', 'Admin/Gallery::remove_image');
	
	$routes->get('adminUploadImages', 'Admin/Gallery::add_image_page');
	$routes->post('add_new_image', 'Admin/Gallery::add_new_image');
	$routes->post('add_new_video', 'Admin/Gallery::add_new_video');
	$routes->get('adminNewletter', 'Admin/Newletters::adminNewletter_page');
	$routes->get('assignmentHelp','Admin/Assignments::index');

    //addcurriculum
    $routes->post('assignCurriculumToStudents','Admin/Curriculum::addCurriculum');

	// add_subject
	$routes->get('add_subjects','Admin/Subjects::index');
	// add_new_subject
	$routes->post('add_new_subject', 'Admin/Subjects::add_new_subject');

	// add_new_subject_globaly
	$routes->post('add_new_subject_globaly', 'Admin/Subjects::add_new_subject_globaly');


	//add student
	$routes->get('adminStudentRegisration','Admin/Students::student_registration');
	$routes->post('adminAddStudent','Admin/Students::adminAddStudent');
	// assignSubjectsStudents
	$routes->get('assignSubjectsStudents','Admin/Manage::assignSubjectsStudents');
	// getMyStudents
	$routes->post('getMyStudents','Admin/Manage::getMyStudents');
	// getMySubjects
	$routes->post('getMySubjects','Admin/Manage::getMySubjects');
	// assignSubjectsToStudents
	$routes->post('assignSubjectsToStudents','Admin/Manage::assignSubjectsToStudents');
	
// 	assignSubjectsToTeachers
	$routes->post('assignSubjectsToTeachers','Admin/Manage::assignSubjectsToTeachers');
	
	//all students
	$routes->get('adminAllStudents','Admin/Students::allStudents');
	//teacher 
	$routes->get('adminTeacherRegistration','Admin/Teachers::teacher_registration');
	$routes->post('adminAddTeacher','Admin/Teachers::adminAddTeacher');
	
// 	assignSubjectsTeacher
	$routes->get('assignSubjectsTeacher','Admin/Teachers::assignSubjectsTeacher');
	
	//all students
	$routes->get('adminAllTeacher','Admin/Teachers::allTeacher');
	$routes->get('remove_teacher/(:num)', 'Admin/Students::remove_teacher');
	
	//resume
	$routes->get('adminViewResume','Admin/Teachers::adminViewResume');
	//curriculum
	$routes->get('adminCurriculumStudent','Admin/Curriculum::adminCurriculumStudent');
	$routes->post('addCurriculum','Admin/Curriculum::addCurriculum');
    $routes->get('remove_curriculum/(:num)', 'Admin/Curriculum::remove_curriculum');
	$routes->get('remove_teacher_curriculum/(:num)', 'Admin/Curriculum::remove_teacher_curriculum');

	// adminStudentCertification
	$routes->get('adminStudentCertification','Admin/Certification::adminStudentCertification');
	$routes->post('send_certificate','Admin/Certification::send_certificate');

	// adminAuditReport
	$routes->get('adminAuditReport','Admin/AuditReport::adminAuditReport');
	$routes->post('audit_report','Admin/AuditReport::audit_report');

	// adminWarning	
	$routes->get('adminWarning','Admin/AuditReport::adminWarning');

	// adminStudentNotification
	$routes->get('adminStudentNotification','Admin/Notification::adminStudentNotification');
	$routes->post('send_notification','Admin/Notification::send_notification');


	$routes->post('getSubjects','Admin/Students::students_subjects');
	$routes->post('getStudents','Admin/Students::students_students');
		
    //student delete
	$routes->get('remove_student/(:num)', 'Admin/Students::remove_student');
	

	$routes->post('getTeachers','Admin/Students::subjects_teachers');
	
	
	$routes->post('getSubjectsGrade','Admin/Students::getSubjectsGrade');
	
	// adminStudentPromotion
	$routes->get('adminStudentPromotion','FrontEnd/Student::adminStudentPromotion');

	// admincertificates	
	$routes->get('admincertificates','Admin/Student::admincertificates');

    // remove_certificate
    $routes->get('remove_certificate/(:num)', 'Admin/Students::remove_certificate');
	
	// adminRequestQuiz
	$routes->get('adminRequestQuiz','Admin/Quiz::adminRequestQuiz');
	// adminAddQuiz
	$routes->get('adminAddQuiz','Admin/Quiz::adminAddQuiz');
	// create_quiz
	$routes->post('create_quiz','Admin/Quiz::create_quiz');
	// add_new_question	
	$routes->post('add_new_question','Admin/Quiz::add_new_question');

	// quiz_make_live
	$routes->get('quiz_make_live/(:num)','Admin/Quiz::quiz_make_live');
	
	// pending_quiz_make_live
	$routes->get('pending_quiz_make_live/(:num)','Admin/Quiz::pending_quiz_make_live');
	
	// quiz_delete
	$routes->get('quiz_delete/(:num)','Admin/Quiz::quiz_delete');
	

	// adminRequestTestresults
	$routes->get('adminRequestTestresults','Admin/Requests::adminRequestTestresults');

	// adminRequestTest
	$routes->get('adminRequestTest','Admin/Requests::adminRequestTest');

	// adminRequestReportCard
	$routes->get('adminRequestReportCard','Admin/Requests::adminRequestReportCard');

	// adminRequestStudyMaterial
	$routes->get('adminRequestStudyMaterial','Admin/Requests::adminRequestStudyMaterial');

	// adminRequestPerformance
	$routes->get('adminRequestPerformance','Admin/Requests::adminRequestPerformance');

	// adminRequestTeacherFeedback
	$routes->get('adminRequestTeacherFeedback','Admin/Requests::adminRequestTeacherFeedback');

	// adminRequestRescheduleClass
	$routes->get('adminRequestRescheduleClass','Admin/Requests::adminRequestRescheduleClass');


	//live classes
	$routes->get('adminLiveClasses','Admin/Classes_sessions::adminLiveClasses_page');	
	$routes->post('add_LiveClasses','Admin/Classes_sessions::adminLiveClasses');
	//requests ----------------------------->
	$routes->get('adminViewRequest','Admin/Requests::ViewRequests_page');	

	// adminRequestHomework
	$routes->get('adminRequestHomework','Admin/Requests::homeworkRequests_page');	
	//delete homework
	$routes->get('delete_homework/(:num)','Admin/Homework::delete_homework');	
	//approve homework
	$routes->get('approve_homework/(:num)','Admin/Homework::approve_homework');	
	// decline_homework
	$routes->get('decline_homework/(:num)','Admin/Homework::decline_homework');	
	//add homework
	$routes->post('upload_homework', 'Admin/Homework::homework_submit');

	// adminSessionHistory
	$routes->get('adminSessionHistory','Admin/Sessions::SessionHistory_page');	
	
	//attendance
	$routes->get('adminAttendenceStudent','Admin/Attendence::AttendenceStudent');	
	$routes->get('adminAttendenceTeacher','Admin/Attendence::AttendenceTeacher');	
	
	
	// adminTeacherBilling
	$routes->get('adminTeacherBilling','Admin/Billing::adminTeacherBilling');	
	$routes->post('finalStdBill', 'Admin/Billing::finalStdBill');
	
	// adminStudentBilling
	$routes->get('adminStudentBilling','Admin/Billing::adminStudentBilling');	
	$routes->post('finalStdBill', 'Admin/Billing::finalStdBill');
	
	// add_report_card
	$routes->post('add_report_card', 'Admin/ReportCard::add_report_card');
	$routes->get('delete_ReportCard/(:num)','Admin/ReportCard::delete_ReportCard');	
	
	// adminRegularPlan
	$routes->get('adminRegularPlan','Admin/Plans::adminRegularPlan');	
	// adminWeeklyPlan
	$routes->get('adminWeeklyPlan','Admin/Plans::adminWeeklyPlan');	
	// adminMonthlyPlan
	$routes->get('adminMonthlyPlan','Admin/Plans::adminMonthlyPlan');	
	
		// adminCurriculumTeacher
	$routes->get('adminCurriculumTeacher','Admin/Curriculum::adminCurriculumTeacher');
	$routes->post('assignCurriculumTeacher','Admin/Curriculum::assignCurriculumTeacher');
    $routes->post('assignCurriculumToTeachers','Admin/Curriculum::assignCurriculumToTeachers');

	//approve test
	$routes->get('approve_test/(:num)','Admin/Tests::approve_test');	
	
	// upload_tests
    $routes->post('upload_tests','Admin/Tests::upload_tests');

		// upload_study_materials
    $routes->post('upload_study_materials','Teacher/Study_materials::upload_study_materials_admin');


$routes->post('send_warning_to_teacher','Admin/AuditReport::send_warning_to_teacher');

}
);


// routes end 
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
