<?php

use Illuminate\Support\Facades\Route;
//////client
use App\Http\Controllers\Client\ClienHomeControllers;
use App\Http\Controllers\Client\About\ClientAboutControllers;
use App\Http\Controllers\Client\Course\ClientCourseControllers;
use App\Http\Controllers\Client\Course\BuyCourseController;
use App\Http\Controllers\Client\CRM\ClientCRMControllers;
use App\Http\Controllers\Client\Career\ClientCareerControllers;
use App\Http\Controllers\Client\Training\ClientTrainingController;
use App\Http\Controllers\Client\Video\ClientVideoControllers;
use App\Http\Controllers\Client\Blog\ClientBlogControllers;
use App\Http\Controllers\Client\Contact\ClientContactControllers;
//////student
use App\Http\Controllers\Client\Student\Payment\StudentPaymentControllers;
use App\Http\Controllers\Client\Student\Profile\StudentProfileControllers;
use App\Http\Controllers\Client\Student\Subject\StudentSubjectControllers;
use App\Http\Controllers\Client\Student\Video\StudentVideoControllers;
#forgot pass
use App\Http\Controllers\ForgotPasswordController;

use App\Http\Controllers\Client\Student\StudentChangePasswordControllers;
use App\Http\Controllers\Client\Student\StudentClassvControllers;
use App\Http\Controllers\Client\Student\StudentDashboardControllers;
use App\Http\Controllers\Client\Student\StudentLoginControllers;
use App\Http\Controllers\Client\Student\StudentSignupControllers;
use App\Http\Controllers\Client\Student\StudentTest1Controllers;

///////admin
use App\Http\Controllers\Admin\AdminAtuthControllers;
use App\Http\Controllers\Admin\AdminDashboardControllers;
use App\Http\Controllers\Admin\Register\RegisterControllers;
use App\Http\Controllers\Admin\Register\HrController;
use App\Http\Controllers\Admin\Course\CourseControllers;
use App\Http\Controllers\Admin\Course\CourseTopicControllers;
use App\Http\Controllers\Admin\Course\CourseVideoControllers;
use App\Http\Controllers\Admin\Course\CoursePDFControllers;
use App\Http\Controllers\Admin\Course\CourseAssignTopicControllers;

use App\Http\Controllers\Admin\Question\QuestionTopicControllers;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\Rcm\RcmController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\AdminCandidateController;
use App\Http\Controllers\Admin\CompanyController;

#Hr Portal
use App\Http\Controllers\Admin\Auth\HrAuthController;
use App\Http\Controllers\HR\DashboardController;
use App\Http\Controllers\HR\CandidateController;
use App\Http\Controllers\HR\CandidateInterviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!   
|
*/

Route::get('/',[ClienHomeControllers::class,'Index']);
Route::get('/about',[ClientAboutControllers::class,'Index']);
Route::get('/course/{subject}',[ClientCourseControllers::class,'Index']);
Route::get('/rcm',[ClientCRMControllers::class,'Index']);
Route::get('/career',[ClientCareerControllers::class,'Index']);
Route::get('/training/{course}',[ClientTrainingController::class,'index']);
Route::get('/training/medical-coding',[ClientTrainingController::class,'MedicalCoding']);
Route::get('/training/medical-billing-ar',[ClientTrainingController::class,'MedicalBilling']);
Route::get('/training/on-job-training',[ClientTrainingController::class,'OnJob']);
Route::get('/videos',[ClientVideoControllers::class,'Index']);

Route::get('/blogs',[ClientBlogControllers::class,'Index']);
Route::get('/blog-details/{name}/',[ClientBlogControllers::class,'BlogDeatils']);

Route::get('/contact-us',[ClientContactControllers::class,'Index']);

/////student//
Route::match(['get','post'],'/student/log-in',[StudentLoginControllers::class,'Index']);
Route::match(['get','post'],'/student/forgot-password',[ForgotPasswordController::class,'Index']);

Route::get('/student/logout',[StudentLoginControllers::class,'logout']);
Route::match(['get','post'],'/student/sign-up',[StudentSignupControllers::class,'Index']);

#Course Purchase
Route::get('/course/buy-now/{subject}',[BuyCourseController::class, 'index']);
Route::post('/course/buy-now/{subject}',[BuyCourseController::class, 'buyCourse']);

Route::group(['prefix' => 'student', 'middleware' => 'StudentAuth'], function () {
	Route::get('/dashboard',[StudentDashboardControllers::class,'Index']);
	Route::get('/video',[StudentVideoControllers::class,'Index']);
	Route::get('/learn-with-video/{subject}/{topic}',[StudentVideoControllers::class,'getCourseVideos']);
	Route::get('/my-course/{subject}/{topic}',[StudentSubjectControllers::class,'index']);
	Route::get('/my-course/subject2',[StudentSubjectControllers::class,'Subject2']);
	Route::get('/online-test/{subject}/{topic}',[StudentSubjectControllers::class,'onlineTest']);
	Route::get('/start-test/{subject}/{topic}',[StudentSubjectControllers::class,'startTestAndSave']);
	Route::post('/start-test/{subject}/{topic}',[StudentSubjectControllers::class,'startTestAndSave']);
	#paymentHistory
	Route::get('/payment-history',[StudentPaymentControllers::class,'index']);
	Route::match(['get', 'post'], '/my-profile',[StudentProfileControllers::class,'index']);
	#Change Passsword
	Route::match(['get', 'post'], '/change-password',[StudentChangePasswordControllers::class,'index']);
	#invoice
	Route::get('/invoice/{id?}',[StudentDashboardControllers::class,'studentInvoice']);
	# student exam report
	Route::get('/report/{id}',[StudentSubjectControllers::class,'report']);
});


////////admin/////////

Route::match(['get','post'],'/admins-login',[AdminAtuthControllers::class,'Index']);
Route::get('/admin/logout',[AdminAtuthControllers::class,'logout']);
Route::group(['prefix' => 'admin', 'middleware' => 'AdminAuth'], function () {
	Route::get('/dashboard',[AdminDashboardControllers::class,'Index']);
	Route::match(['get','post'],'/register/register',[RegisterControllers::class,'Index']);
	Route::get('/register/register-view',[RegisterControllers::class,'ListRegister']);
	Route::get('/register/update-register/{id?}/',[RegisterControllers::class,'GetUpdate']);
	Route::get('/register/delete-register/{id?}/',[RegisterControllers::class,'Delete']);
	Route::get('/register/studunt-test-list/{id?}/',[RegisterControllers::class,'getTestList']);
	# student exam report
	Route::get('/studunt/report/{id}',[RegisterControllers::class,'report']);

	Route::match(['get','post'],'/course/add-course',[CourseControllers::class,'Index']);
	Route::get('/course/update-course/{id?}/',[CourseControllers::class,'GetUpdate']);
	Route::get('/course/delete-course/{id?}/',[CourseControllers::class,'Delete']);
	
	Route::match(['get','post'],'/course/add-topic-detail',[CourseTopicControllers::class,'Index']);
	Route::get('/course/update-topic-detail/{id?}/',[CourseTopicControllers::class,'GetUpdate']);
	Route::get('/course/delete-topic-detail/{id?}/',[CourseTopicControllers::class,'Delete']);

	Route::match(['get','post'],'/add-video',[CourseVideoControllers::class,'Index']);
	Route::get('/update-video/{id?}/',[CourseVideoControllers::class,'GetUpdate']);
	Route::get('/delete-video/{id?}/',[CourseVideoControllers::class,'Delete']);

	Route::match(['get','post'],'/add-pdf',[CoursePDFControllers::class,'Index']);
	Route::get('/update-pdf/{id?}/',[CoursePDFControllers::class,'GetUpdate']);
	Route::get('/delete-pdf/{id?}/',[CoursePDFControllers::class,'Delete']);

	Route::match(['get','post'],'/course/assign-topic',[CourseAssignTopicControllers::class,'Index']);
	Route::get('/course/update-assign-topic/{id?}',[CourseAssignTopicControllers::class,'getUpdate']);
	Route::get('/course/delete-assign-topic/{id?}',[CourseAssignTopicControllers::class,'Delete']);
	
	Route::get('/delete-pdf/{id?}/',[CoursePDFControllers::class,'Delete']);
	#Questions
	Route::get('/exam',[QuestionTopicControllers::class,'Index']);
	Route::get('/add-question',[QuestionTopicControllers::class,'addQuestion']);
	Route::post('/add-question',[QuestionTopicControllers::class,'saveQuestion']);
	Route::get('/edit-question/{id}/',[QuestionTopicControllers::class,'editQuestion']);
	Route::post('/update-question/{id}/',[QuestionTopicControllers::class,'editQuestion']);
	Route::get('/delete-question/{id}/',[QuestionTopicControllers::class,'delete']);
	Route::get('/exam/question-list',[QuestionTopicControllers::class,'allQuestionView']);
	
	#About Us
	Route::get('/about-content/',[AboutUsController::class,'index']);
	Route::post('/update-content/',[AboutUsController::class,'update']);
	#Team Details
	Route::get('/team-details/',[AboutUsController::class,'teamIndex']);
	Route::post('/save-team-details/',[AboutUsController::class,'saveTeamDetails']);
	Route::get('/edit-team-detail/{id}/',[AboutUsController::class,'editTeamDetail']);
	Route::post('/update-team-detail/{id}/',[AboutUsController::class,'editTeamDetail']);
	Route::get('/delete-team-detail/{id}/',[AboutUsController::class,'deleteTeamDetail']);
	#Rcm
	Route::get('/rcm/',[RcmController::class,'index']);
	Route::post('/update-rcm-content/',[RcmController::class,'update']);
	#Career
	Route::get('/careers/',[CareerController::class,'index']);
	Route::post('/save-career/',[CareerController::class,'store']);
	Route::get('/edit-career/{id}',[CareerController::class,'edit']);
	Route::post('/update-career/{id}/',[CareerController::class,'edit']);
	Route::get('/delete-career/{id}/',[CareerController::class,'delete']);
	#Training
	Route::get('/training/',[TrainingController::class,'index']);
	Route::post('/save-training/',[TrainingController::class,'store']);
	Route::get('/edit-training/{id}',[TrainingController::class,'edit']);
	Route::post('/update-training/{id}/',[TrainingController::class,'edit']);
	Route::get('/delete-training/{id}/',[TrainingController::class,'delete']);
	#Video
	Route::get('/video/',[VideoController::class,'index']);
	Route::post('/save-video/',[VideoController::class,'store']);
	Route::get('/edit-video/{id}',[VideoController::class,'edit']);
	Route::post('/update-video/{id}/',[VideoController::class,'edit']);
	Route::get('/destroy-video/{id}/',[VideoController::class,'delete'])->name('destroy-video');
	#Blog
	Route::get('/blog/',[BlogController::class,'index']);
	Route::post('/save-blog/',[BlogController::class,'store']);
	Route::get('/edit-blog/{id}',[BlogController::class,'edit']);
	Route::post('/update-blog/{id}/',[BlogController::class,'edit']);
	Route::get('/delete-blog/{id}/',[BlogController::class,'delete']);
	#Homepage:Header
	Route::get('/header/',[HomePageController::class,'headerIndex']);
	Route::post('/save-header/',[HomePageController::class,'headerStore']);
	Route::get('/edit-header/{id}',[HomePageController::class,'headerEdit']);
	Route::post('/update-header/{id}/',[HomePageController::class,'headerEdit']);
	Route::get('/delete-header/{id}/',[HomePageController::class,'headerDelete']);
	#Company
	Route::get('/company-details/',[HomePageController::class,'companyIndex']);
	Route::post('/save-company-details/',[HomePageController::class,'companyStore']);
	Route::get('/edit-company-details/{id}',[HomePageController::class,'companyEdit']);
	Route::post('/update-company-details/{id}/',[HomePageController::class,'companyEdit']);
	Route::get('/delete-company-details/{id}/',[HomePageController::class,'companyDelete']);
	#Client
	Route::get('/clients/',[HomePageController::class,'clientIndex']);
	Route::post('/save-client/',[HomePageController::class,'clientStore']);
	Route::get('/edit-client/{id}',[HomePageController::class,'clientEdit']);
	Route::post('/update-client/{id}/',[HomePageController::class,'clientEdit']);
	Route::get('/delete-client/{id}/',[HomePageController::class,'clientDelete']);
	#HR Registration

	Route::get('/hr/list/',[HrController::class,'list']);
	Route::get('/hr/add/',[HrController::class,'index']);
	Route::post('/hr/save/',[HrController::class,'store']);
	Route::get('/hr/edit/{id}',[HrController::class,'edit']);
	Route::post('/hr/update/{id}/',[HrController::class,'edit']);
	Route::get('/hr/delete/{id}/',[HrController::class,'destroy']);
	#Payment History
	Route::get('/payment-history',[PaymentController::class, 'index']);
	Route::get('/payment-history/filter/',[PaymentController::class, 'index']);
	#Add Candidate
	Route::match(['get','post'],'/candidate/add/',[AdminCandidateController::class,'add']);
	Route::get('/candidate/destroy/{id}/',[AdminCandidateController::class,'destroy']);
	#Candidate List
	Route::get('/candidate/list/',[AdminCandidateController::class,'list']);
	Route::get('/candidate/list/filter/',[AdminCandidateController::class,'list']);
	#Company
	Route::match(['get', 'post'],'/company',[CompanyController::class,'Index']);
	Route::get('/update-company/{id?}',[CompanyController::class,'getSingaleData']);
	Route::get('/delete-company/{id?}',[CompanyController::class,'destroy']);
	#Payment
	Route::get('/invoice/{id?}',[AdminDashboardControllers::class,'studentInvoice']);
	
	
});

#Hr Portal
Route::match(['get','post'],'/hr/login',[HrAuthController::class, 'index']);
Route::match(['get','post'], '/hr/change-password',[HrAuthController::class, 'changePassword']);
Route::get('/hr/logout',[HrAuthController::class, 'logout']);

Route::group(['prefix' => 'hr', 'middleware' => 'HrAuth'], function () {
	Route::get('/dashboard',[DashboardController::class,'index']);

	#Add Candidate
	Route::get('/download-cv',[CandidateController::class,'downloadResume']);
	Route::match(['get','post'],'/candidate/add/',[CandidateController::class,'add']);
	Route::get('/candidate/edit-details/{id}',[CandidateController::class,'edit']);
	Route::post('/candidate/update-details/{id}/',[CandidateController::class,'edit']);
	Route::get('/candidate/destroy/{id}/',[CandidateController::class,'destroy']);
	#Assign Candidate Interview
	Route::get('/candidate/interview/',[CandidateInterviewController::class,'index']);
	Route::post('/candidate/interview/status/',[CandidateInterviewController::class,'updateStatus']);
	Route::post('/candidate/assign-interview/',[CandidateInterviewController::class,'assignInterview']);
	Route::get('/candidate/assign-interview/edit/{id}',[CandidateInterviewController::class,'edit']);
	Route::post('/candidate/assign-interview/update/{id}/',[CandidateInterviewController::class,'edit']);
	Route::get('/candidate/assign-interview/delete/{id}/',[CandidateInterviewController::class,'destroy']);
	Route::post('/company/add/',[CandidateInterviewController::class,'addCompany']);
	#Candidate List
	Route::get('/candidate/list/',[CandidateInterviewController::class,'list']);
	Route::get('/candidate/list/filter/',[CandidateInterviewController::class,'list']);
});
