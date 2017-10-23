<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
//$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = 'pagenotfound';


/*admin*/
//brands routes
$route['admin/brands'] = 'admin/brands';
$route['admin'] = 'admin/user/index';
$route['admin/dashboard'] = 'admin/user/dashboard';
$route['admin/signup'] = 'user/signup';
$route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'admin/user/index';
$route['admin/logout'] = 'admin/user/logout';
$route['admin/backup'] = 'admin/user/backup_db';
$route['admin/login/validate_credentials'] = 'admin/user/validate_credentials';

$route['admin/products'] = 'admin/admin_products/index';
$route['admin/products/add'] = 'admin/admin_products/add';
$route['admin/products/update'] = 'admin/admin_products/update';
$route['admin/products/update/(:any)'] = 'admin/admin_products/update/$1';
$route['admin/products/delete/(:any)'] = 'admin/admin_products/delete/$1';
$route['admin/products/(:any)'] = 'admin/admin_products/index/$1'; //$1 = page number

$route['admin/manufacturers'] = 'admin/admin_manufacturers/index';
$route['admin/manufacturers/add'] = 'admin/admin_manufacturers/add';
$route['admin/manufacturers/update'] = 'admin/admin_manufacturers/update';
$route['admin/manufacturers/update/(:any)'] = 'admin/admin_manufacturers/update/$1';
$route['admin/manufacturers/delete/(:any)'] = 'admin/admin_manufacturers/delete/$1';
$route['admin/manufacturers/(:any)'] = 'admin/admin_manufacturers/index/$1'; //$1 = page number

$route['admin/content_pages'] = 'admin/admin_content_pages/index';
$route['admin/content_pages/add'] = 'admin/admin_content_pages/add';
$route['admin/content_pages/update'] = 'admin/admin_content_pages/update';
$route['admin/content_pages/update/(:any)'] = 'admin/admin_content_pages/update/$1';
$route['admin/content_pages/delete/(:any)'] = 'admin/admin_content_pages/delete/$1';
$route['admin/content_pages/(:any)'] = 'admin/admin_content_pages/index/$1'; //$1 = page number

$route['admin/countries'] = 'admin/admin_countries/index';
$route['admin/countries/add'] = 'admin/admin_countries/add';
$route['admin/countries/update'] = 'admin/admin_countries/update';
$route['admin/countries/update/(:any)'] = 'admin/admin_countries/update/$1';
$route['admin/countries/delete/(:any)'] = 'admin/admin_countries/delete/$1';
$route['admin/countries/(:any)'] = 'admin/admin_countries/index/$1'; //$1 = page number

$route['admin/course_categories'] = 'admin/admin_course_categories/index';
$route['admin/course_categories/add'] = 'admin/admin_course_categories/add';
$route['admin/course_categories/update'] = 'admin/admin_course_categories/update';
$route['admin/course_categories/update/(:any)'] = 'admin/admin_course_categories/update/$1';
$route['admin/course_categories/delete/(:any)'] = 'admin/admin_course_categories/delete/$1';
$route['admin/course_categories/(:any)'] = 'admin/admin_course_categories/index/$1'; //$1 = page number

$route['admin/courses'] = 'admin/admin_courses/index';
$route['admin/courses/add'] = 'admin/admin_courses/add';
$route['admin/courses/update'] = 'admin/admin_courses/update';
$route['admin/courses/update/(:any)'] = 'admin/admin_courses/update/$1';
$route['admin/courses/details/(:any)'] = 'admin/admin_courses/details/$1';
$route['admin/courses/delete/(:any)'] = 'admin/admin_courses/delete/$1';
$route['admin/courses/(:any)'] = 'admin/admin_courses/index/$1'; //$1 = page number

$route['admin/managecourses/(:any)/(:any)'] = 'admin/admin_managecourses/index/$1/$1';
$route['admin/managecourses/add'] = 'admin/admin_managecourses/add/$1';
$route['admin/managecourses/update'] = 'admin/admin_managecourses/update';
//$route['admin/managecourses/update/(:any)'] = 'admin/admin_managecourses/update/$1';
$route['admin/managecourses/details/(:any)'] = 'admin/admin_managecourses/details/$1';
$route['admin/managecourses/delete/(:any)'] = 'admin/admin_managecourses/delete/$1';
$route['admin/managecourses/(:any)'] = 'admin/admin_managecourses/index/$1'; //$1 = page number
//$route['admin/managecourses/get_course_batch'] = 'admin/admin_managecourses/get_course_batch';
//$route['admin/managecourses/get_course_batch1'] = 'admin/admin_managecourses/get_course_batch1';

$route['admin/student_videos'] = 'admin/admin_student_videos/index';
$route['admin/student_videos/get_course_batch'] = 'admin/admin_student_videos/get_course_batch';
$route['admin/student_videos/add'] = 'admin/admin_student_videos/add';
$route['admin/student_videos/update'] = 'admin/admin_student_videos/update';
$route['admin/student_videos/update/(:any)'] = 'admin/admin_student_videos/update/$1';
$route['admin/student_videos/details/(:any)'] = 'admin/admin_student_videos/details/$1';
$route['admin/student_videos/delete/(:any)'] = 'admin/admin_student_videos/delete/$1';
$route['admin/student_videos/(:any)'] = 'admin/admin_student_videos/index/$1'; //$1 = page number

$route['admin/student_ebooks'] = 'admin/admin_student_ebooks/index';
$route['admin/student_ebooks/get_course_batch'] = 'admin/admin_student_ebooks/get_course_batch';
$route['admin/student_ebooks/add'] = 'admin/admin_student_ebooks/add';
$route['admin/student_ebooks/update'] = 'admin/admin_student_ebooks/update';
$route['admin/student_ebooks/update/(:any)'] = 'admin/admin_student_ebooks/update/$1';
$route['admin/student_ebooks/details/(:any)'] = 'admin/admin_student_ebooks/details/$1';
$route['admin/student_ebooks/delete/(:any)'] = 'admin/admin_student_ebooks/delete/$1';
$route['admin/student_ebooks/(:any)'] = 'admin/admin_student_ebooks/index/$1'; //$1 = page number


$route['admin/course_batches'] = 'admin/admin_course_batches/index';
$route['admin/course_batches/add'] = 'admin/admin_course_batches/add';
$route['admin/course_batches/get_course_cat'] = 'admin/admin_course_batches/get_course_cat';
$route['admin/course_batches/update'] = 'admin/admin_course_batches/update';
$route['admin/course_batches/update/(:any)'] = 'admin/admin_course_batches/update/$1';
$route['admin/course_batches/details/(:any)'] = 'admin/admin_course_batches/details/$1';
$route['admin/course_batches/delete/(:any)'] = 'admin/admin_course_batches/delete/$1';
$route['admin/course_batches/(:any)'] = 'admin/admin_course_batches/index/$1'; //$1 = page number

$route['admin/group_discussion'] = 'admin/admin_group_discussion/index';
$route['admin/group_discussion/add'] = 'admin/admin_group_discussion/add';
$route['admin/group_discussion/update'] = 'admin/admin_group_discussion/update';
$route['admin/group_discussion/update/(:any)'] = 'admin/admin_group_discussion/update/$1';
$route['admin/group_discussion/details/(:any)'] = 'admin/admin_group_discussion/details/$1';
$route['admin/group_discussion/delete/(:any)'] = 'admin/admin_group_discussion/delete/$1';
$route['admin/group_discussion/(:any)'] = 'admin/admin_group_discussion/index/$1'; //$1 = page number

$route['admin/question_answer'] = 'admin/admin_question_answer/index';
$route['admin/question_answer/add'] = 'admin/admin_question_answer/add';
$route['admin/question_answer/update'] = 'admin/admin_question_answer/update';
$route['admin/question_answer/update/(:any)'] = 'admin/admin_question_answer/update/$1';
$route['admin/question_answer/details/(:any)'] = 'admin/admin_question_answer/details/$1';
$route['admin/question_answer/delete/(:any)'] = 'admin/admin_question_answer/delete/$1';
$route['admin/question_answer/(:any)'] = 'admin/admin_question_answer/index/$1'; //$1 = page number



$route['admin/tutors'] = 'admin/admin_tutors/index';
$route['admin/tutors/add'] = 'admin/admin_tutors/add';
$route['admin/tutors/update'] = 'admin/admin_tutors/update';
$route['admin/tutors/update/(:any)'] = 'admin/admin_tutors/update/$1';
$route['admin/tutors/details/(:any)'] = 'admin/admin_tutors/details/$1';
$route['admin/tutors/delete/(:any)'] = 'admin/admin_tutors/delete/$1';
$route['admin/tutors/(:any)'] = 'admin/admin_tutors/index/$1'; //$1 = page number

$route['admin/register_students'] = 'admin/admin_register_students/index';
$route['admin/register_students/add'] = 'admin/admin_register_students/add';
$route['admin/register_students/update'] = 'admin/admin_register_students/update';
$route['admin/register_students/update/(:any)'] = 'admin/admin_register_students/update/$1';
$route['admin/register_students/details/(:any)'] = 'admin/admin_register_students/details/$1';
$route['admin/register_students/delete/(:any)'] = 'admin/admin_register_students/delete/$1';
$route['admin/register_students/(:any)'] = 'admin/admin_register_students/index/$1'; //$1 = page number

$route['admin/course_orders'] = 'admin/admin_course_orders/index';
$route['admin/course_orders/add'] = 'admin/admin_course_orders/add';
$route['admin/course_orders/update'] = 'admin/admin_course_orders/update';
$route['admin/course_orders/update/(:any)'] = 'admin/admin_course_orders/update/$1';
$route['admin/course_orders/details/(:any)'] = 'admin/admin_course_orders/details/$1';
$route['admin/course_orders/delete/(:any)'] = 'admin/admin_course_orders/delete/$1';
$route['admin/course_orders/(:any)'] = 'admin/admin_course_orders/index/$1'; //$1 = page number

$route['admin/testimonials'] = 'admin/admin_testimonials/index';
$route['admin/testimonials/add'] = 'admin/admin_testimonials/add';
$route['admin/testimonials/update'] = 'admin/admin_testimonials/update';
$route['admin/testimonials/update/(:any)'] = 'admin/admin_testimonials/update/$1';
$route['admin/testimonials/details/(:any)'] = 'admin/admin_testimonials/details/$1';
$route['admin/testimonials/delete/(:any)'] = 'admin/admin_testimonials/delete/$1';
$route['admin/testimonials/(:any)'] = 'admin/admin_testimonials/index/$1'; //$1 = page number

$route['admin/banners'] = 'admin/admin_banners/index';
$route['admin/banners/add'] = 'admin/admin_banners/add';
$route['admin/banners/update'] = 'admin/admin_banners/update';
$route['admin/banners/update/(:any)'] = 'admin/admin_banners/update/$1';
$route['admin/banners/details/(:any)'] = 'admin/admin_banners/details/$1';
$route['admin/banners/delete/(:any)'] = 'admin/admin_banners/delete/$1';
$route['admin/banners/(:any)'] = 'admin/admin_banners/index/$1'; //$1 = page number

$route['admin/news'] = 'admin/admin_news/index';
$route['admin/news/add'] = 'admin/admin_news/add';
$route['admin/news/update'] = 'admin/admin_news/update';
$route['admin/news/update/(:any)'] = 'admin/admin_news/update/$1';
$route['admin/news/details/(:any)'] = 'admin/admin_news/details/$1';
$route['admin/news/delete/(:any)'] = 'admin/admin_news/delete/$1';
$route['admin/news/(:any)'] = 'admin/admin_news/index/$1'; //$1 = page number

$route['admin/homecourse'] = 'admin/admin_homecourse/index';
$route['admin/homecourse/add'] = 'admin/admin_homecourse/add';
$route['admin/homecourse/update'] = 'admin/admin_homecourse/update';
$route['admin/homecourse/update/(:any)'] = 'admin/admin_homecourse/update/$1';
$route['admin/homecourse/details/(:any)'] = 'admin/admin_homecourse/details/$1';
$route['admin/homecourse/delete/(:any)'] = 'admin/admin_homecourse/delete/$1';
$route['admin/homecourse/(:any)'] = 'admin/admin_homecourse/index/$1'; //$1 = page number


$route['admin/blog'] = 'admin/admin_blog/index';
$route['admin/blog/add'] = 'admin/admin_blog/add';
$route['admin/blog/update'] = 'admin/admin_blog/update';
$route['admin/blog/update/(:any)'] = 'admin/admin_blog/update/$1';
$route['admin/blog/details/(:any)'] = 'admin/admin_blog/details/$1';
$route['admin/blog/delete/(:any)'] = 'admin/admin_blog/delete/$1';
$route['admin/blog/(:any)'] = 'admin/admin_blog/index/$1'; //$1 = page number

$route['admin/live_projects'] = 'admin/admin_live_projects/index';
$route['admin/live_projects/add'] = 'admin/admin_live_projects/add';
$route['admin/live_projects/update'] = 'admin/admin_live_projects/update';
$route['admin/live_projects/update/(:any)'] = 'admin/admin_live_projects/update/$1';
$route['admin/live_projects/details/(:any)'] = 'admin/admin_live_projects/details/$1';
$route['admin/live_projects/delete/(:any)'] = 'admin/admin_live_projects/delete/$1';
$route['admin/live_projects/(:any)'] = 'admin/admin_live_projects/index/$1'; //$1 = page number

$route['admin/careers'] = 'admin/admin_careers/index';
$route['admin/careers/add'] = 'admin/admin_careers/add';
$route['admin/careers/update'] = 'admin/admin_careers/update';
$route['admin/careers/update/(:any)'] = 'admin/admin_careers/update/$1';
$route['admin/careers/details/(:any)'] = 'admin/admin_careers/details/$1';
$route['admin/careers/delete/(:any)'] = 'admin/admin_careers/delete/$1';
$route['admin/careers/(:any)'] = 'admin/admin_careers/index/$1'; //$1 = page number

$route['admin/internship'] = 'admin/admin_internship/index';
$route['admin/internship/add'] = 'admin/admin_internship/add';
$route['admin/internship/update'] = 'admin/admin_internship/update';
$route['admin/internship/update/(:any)'] = 'admin/admin_internship/update/$1';
$route['admin/internship/details/(:any)'] = 'admin/admin_internship/details/$1';
$route['admin/internship/delete/(:any)'] = 'admin/admin_internship/delete/$1';
$route['admin/internship/(:any)'] = 'admin/admin_internship/index/$1'; //$1 = page number

$route['admin/aboutus'] = 'admin/admin_aboutus/index';
$route['admin/aboutus/add'] = 'admin/admin_aboutus/add';
$route['admin/aboutus/update'] = 'admin/admin_aboutus/update';
$route['admin/aboutus/update/(:any)'] = 'admin/admin_aboutus/update/$1';
$route['admin/aboutus/details/(:any)'] = 'admin/admin_aboutus/details/$1';
$route['admin/aboutus/delete/(:any)'] = 'admin/admin_aboutus/delete/$1';
$route['admin/aboutus/(:any)'] = 'admin/admin_aboutus/index/$1'; //$1 = page number

$route['admin/contact_info'] = 'admin/admin_contact_info/index';
$route['admin/contact_info/add'] = 'admin/admin_contact_info/add';
$route['admin/contact_info/update'] = 'admin/admin_contact_info/update';
$route['admin/contact_info/update/(:any)'] = 'admin/admin_contact_info/update/$1';
$route['admin/contact_info/details/(:any)'] = 'admin/admin_contact_info/details/$1';
$route['admin/contact_info/delete/(:any)'] = 'admin/admin_contact_info/delete/$1';
$route['admin/contact_info/(:any)'] = 'admin/admin_contact_info/index/$1'; //$1 = page number

$route['admin/student_contact'] = 'admin/admin_student_contact/index';
$route['admin/student_contact/add'] = 'admin/admin_student_contact/add';
$route['admin/student_contact/update'] = 'admin/admin_student_contact/update';
$route['admin/student_contact/update/(:any)'] = 'admin/admin_student_contact/update/$1';
$route['admin/student_contact/details/(:any)'] = 'admin/admin_student_contact/details/$1';
$route['admin/student_contact/delete/(:any)'] = 'admin/admin_student_contact/delete/$1';
$route['admin/student_contact/(:any)'] = 'admin/admin_student_contact/index/$1'; //$1 = page number

$route['admin/tutor_contact'] = 'admin/admin_tutor_contact/index';
$route['admin/tutor_contact/add'] = 'admin/admin_tutor_contact/add';
$route['admin/tutor_contact/update'] = 'admin/admin_tutor_contact/update';
$route['admin/tutor_contact/update/(:any)'] = 'admin/admin_tutor_contact/update/$1';
$route['admin/tutor_contact/details/(:any)'] = 'admin/admin_tutor_contact/details/$1';
$route['admin/tutor_contact/delete/(:any)'] = 'admin/admin_tutor_contact/delete/$1';
$route['admin/tutor_contact/(:any)'] = 'admin/admin_tutor_contact/index/$1'; //$1 = page number

$route['admin/tutor_notifications'] = 'admin/admin_tutor_notifications/index';

$route['admin/tutor_notifications/add'] = 'admin/admin_tutor_notifications/add';
$route['admin/tutor_notifications/update'] = 'admin/admin_tutor_notifications/update';
$route['admin/tutor_notifications/update/(:any)'] = 'admin/admin_tutor_notifications/update/$1';
$route['admin/tutor_notifications/details/(:any)'] = 'admin/admin_tutor_notifications/details/$1';
$route['admin/tutor_notifications/delete/(:any)'] = 'admin/admin_tutor_notifications/delete/$1';
$route['admin/tutor_notifications/(:any)'] = 'admin/admin_tutor_notifications/index/$1'; //$1 = page number

$route['admin/student_notifications'] = 'admin/admin_student_notifications/index';
$route['admin/student_notifications/get_course_batch'] = 'admin/admin_student_notifications/get_course_batch';
$route['admin/student_notifications/add'] = 'admin/admin_student_notifications/add';
$route['admin/student_notifications/update'] = 'admin/admin_student_notifications/update';
$route['admin/student_notifications/update/(:any)'] = 'admin/admin_student_notifications/update/$1';
$route['admin/student_notifications/details/(:any)'] = 'admin/admin_student_notifications/details/$1';
$route['admin/student_notifications/delete/(:any)'] = 'admin/admin_student_notifications/delete/$1';
$route['admin/student_notifications/(:any)'] = 'admin/admin_student_notifications/index/$1'; //$1 = page number


$route['admin/corporate_services'] = 'admin/admin_corporate_services/index';
$route['admin/corporate_services/add'] = 'admin/admin_corporate_services/add';
$route['admin/corporate_services/update'] = 'admin/admin_corporate_services/update';
$route['admin/corporate_services/update/(:any)'] = 'admin/admin_corporate_services/update/$1';
$route['admin/corporate_services/details/(:any)'] = 'admin/admin_corporate_services/details/$1';
$route['admin/corporate_services/delete/(:any)'] = 'admin/admin_corporate_services/delete/$1';
$route['admin/corporate_services/(:any)'] = 'admin/admin_corporate_services/index/$1'; //$1 = page number

$route['admin/faqs'] = 'admin/admin_faqs/index';
$route['admin/faqs/add'] = 'admin/admin_faqs/add';
$route['admin/faqs/update'] = 'admin/admin_faqs/update';
$route['admin/faqs/update/(:any)'] = 'admin/admin_faqs/update/$1';
$route['admin/faqs/details/(:any)'] = 'admin/admin_faqs/details/$1';
$route['admin/faqs/delete/(:any)'] = 'admin/admin_faqs/delete/$1';
$route['admin/faqs/(:any)'] = 'admin/admin_faqs/index/$1'; //$1 = page number

$route['admin/newsletters'] = 'admin/admin_newsletters/index';
$route['admin/newsletters/add'] = 'admin/admin_newsletters/add';
$route['admin/newsletters/update'] = 'admin/admin_newsletters/update';
$route['admin/newsletters/update/(:any)'] = 'admin/admin_newsletters/update/$1';
$route['admin/newsletters/details/(:any)'] = 'admin/admin_newsletters/details/$1';
$route['admin/newsletters/delete/(:any)'] = 'admin/admin_newsletters/delete/$1';
$route['admin/newsletters/(:any)'] = 'admin/admin_newsletters/index/$1'; //$1 = page number

$route['admin/course_inquiry_form'] = 'admin/admin_course_inquiry_form/index';
$route['admin/course_inquiry_form/add'] = 'admin/admin_course_inquiry_form/add';
$route['admin/course_inquiry_form/update'] = 'admin/admin_course_inquiry_form/update';
$route['admin/course_inquiry_form/update/(:any)'] = 'admin/admin_course_inquiry_form/update/$1';
$route['admin/course_inquiry_form/details/(:any)'] = 'admin/admin_course_inquiry_form/details/$1';
$route['admin/course_inquiry_form/delete/(:any)'] = 'admin/admin_course_inquiry_form/delete/$1';
$route['admin/course_inquiry_form/(:any)'] = 'admin/admin_course_inquiry_form/index/$1'; //$1 = page number

$route['admin/course_contact'] = 'admin/admin_course_contact/index';
$route['admin/course_contact/add'] = 'admin/admin_course_contact/add';
$route['admin/course_contact/update'] = 'admin/admin_course_contact/update';
$route['admin/course_contact/update/(:any)'] = 'admin/admin_course_contact/update/$1';
$route['admin/course_contact/details/(:any)'] = 'admin/admin_course_contact/details/$1';
$route['admin/course_contact/delete/(:any)'] = 'admin/admin_course_contact/delete/$1';
$route['admin/course_contact/(:any)'] = 'admin/admin_course_contact/index/$1'; //$1 = page number

$route['admin/contact_form'] = 'admin/admin_contact_form/index';
$route['admin/contact_form/add'] = 'admin/admin_contact_form/add';
$route['admin/contact_form/update'] = 'admin/admin_contact_form/update';
$route['admin/contact_form/update/(:any)'] = 'admin/admin_contact_form/update/$1';
$route['admin/contact_form/details/(:any)'] = 'admin/admin_contact_form/details/$1';
$route['admin/contact_form/delete/(:any)'] = 'admin/admin_contact_form/delete/$1';
$route['admin/contact_form/(:any)'] = 'admin/admin_contact_form/index/$1'; //$1 = page number

$route['admin/quick_inquiry'] = 'admin/admin_quick_inquiry/index';
$route['admin/quick_inquiry/add'] = 'admin/admin_quick_inquiry/add';
$route['admin/quick_inquiry/update'] = 'admin/admin_quick_inquiry/update';
$route['admin/quick_inquiry/update/(:any)'] = 'admin/admin_quick_inquiry/update/$1';
$route['admin/quick_inquiry/details/(:any)'] = 'admin/admin_quick_inquiry/details/$1';
$route['admin/quick_inquiry/delete/(:any)'] = 'admin/admin_quick_inquiry/delete/$1';
$route['admin/quick_inquiry/(:any)'] = 'admin/admin_quick_inquiry/index/$1'; //$1 = page number


$route['admin/homecategory'] = 'admin/admin_homecategory/index';
$route['admin/homecategory/add'] = 'admin/admin_homecategory/add';
$route['admin/homecategory/update'] = 'admin/admin_homecategory/update';
$route['admin/homecategory/update/(:any)'] = 'admin/admin_homecategory/update/$1';
$route['admin/homecategory/details/(:any)'] = 'admin/admin_homecategory/details/$1';
$route['admin/homecategory/delete/(:any)'] = 'admin/admin_homecategory/delete/$1';
$route['admin/homecategory/(:any)'] = 'admin/admin_homecategory/index/$1'; //$1 = page number

$route['admin/faculty'] = 'admin/admin_faculty/index';
$route['admin/faculty/add'] = 'admin/admin_faculty/add';
$route['admin/faculty/update'] = 'admin/admin_faculty/update';
$route['admin/faculty/update/(:any)'] = 'admin/admin_faculty/update/$1';
$route['admin/faculty/details/(:any)'] = 'admin/admin_faculty/details/$1';
$route['admin/faculty/delete/(:any)'] = 'admin/admin_faculty/delete/$1';
$route['admin/faculty/(:any)'] = 'admin/admin_faculty/index/$1'; //$1 = page number

$route['admin/homeimage'] = 'admin/admin_homeimage/index';
$route['admin/homeimage/add'] = 'admin/admin_homeimage/add';
$route['admin/homeimage/update'] = 'admin/admin_homeimage/update';
$route['admin/homeimage/update/(:any)'] = 'admin/admin_homeimage/update/$1';
$route['admin/homeimage/details/(:any)'] = 'admin/admin_homeimage/details/$1';
$route['admin/homeimage/delete/(:any)'] = 'admin/admin_homeimage/delete/$1';
$route['admin/homeimage/(:any)'] = 'admin/admin_homeimage/index/$1'; //$1 = page number

$route['admin/gallery'] = 'admin/admin_gallery/index';
$route['admin/gallery/add'] = 'admin/admin_gallery/add';
//$route['admin/gallery/update'] = 'admin/admin_gallery/edit';
$route['admin/gallery/edit/(:any)'] = 'admin/admin_gallery/edit/$1';
//$route['admin/gallery/details/(:any)'] = 'admin/admin_faqs/details/$1';
$route['admin/gallery/delete/(:any)'] = 'admin/admin_gallery/delete/$1';
$route['admin/gallery/(:any)'] = 'admin/admin_faqs/index/$1'; //$1 = page number

$route['admin/account_settings'] = 'admin/admin_account_settings/index';
$route['admin/account_settings/add'] = 'admin/admin_account_settings/add';
$route['admin/account_settings/update'] = 'admin/admin_account_settings/update';
$route['admin/account_settings/update/(:any)'] = 'admin/admin_account_settings/update/$1';
$route['admin/account_settings/delete/(:any)'] = 'admin/admin_account_settings/delete/$1';
$route['admin/account_settings/(:any)'] = 'admin/admin_account_settings/index/$1'; //$1 = page number


$route['admin/changepassword'] = 'admin/admin_changepassword/index';
$route['admin/changepassword/add'] = 'admin/admin_changepassword/add';
$route['admin/changepassword/update'] = 'admin/admin_changepassword/update';
$route['admin/changepassword/update/(:any)'] = 'admin/admin_changepassword/update/$1';
$route['admin/changepassword/delete/(:any)'] = 'admin/admin_changepassword/delete/$1';
$route['admin/changepassword/(:any)'] = 'admin/admin_changepassword/index/$1'; //$1 = page number

/*
$route['admin/group_discussion'] = 'admin/admin_group_discussion/index';
$route['admin/group_discussion/add'] = 'admin/admin_group_discussion/add';
$route['admin/group_discussion/update'] = 'admin/admin_group_discussion/update';
$route['admin/group_discussion/update/(:any)'] = 'admin/admin_group_discussion/update/$1';
$route['admin/group_discussion/delete/(:any)'] = 'admin/admin_group_discussion/delete/$1';
$route['admin/group_discussion/(:any)'] = 'admin/admin_group_discussion/index/$1'; //$1 = page number
*/


