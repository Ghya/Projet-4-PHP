<?php

// Home page
$app->get('/', "ProjetPHP\Controller\HomeController::homeAction")
->bind('home');

// Board page
$app->get('/board', "ProjetPHP\Controller\HomeController::boardAction")
->bind('board');

// Chapter details
$app->match('/chapter/{id}', "ProjetPHP\Controller\HomeController::chapterAction")
->bind('chapter');

// Chapter details
$app->get('/marker/{id}', "ProjetPHP\Controller\HomeController::markerAction")
->bind('marker');

// Login form
$app->get('/login', "ProjetPHP\Controller\HomeController::loginAction")
->bind('login');

// Sign in form
$app->match('/signin', "ProjetPHP\Controller\HomeController::signinAction")
->bind('signin');

// Admin form
$app->get('/admin', "ProjetPHP\Controller\AdminController::indexAction")
->bind('admin');

// Add a new chapter
$app->match('/admin/chapter/add', "ProjetPHP\Controller\AdminController::addChapterAction")
->bind('admin_chapter_add');

// Edit an existing chapter
$app->match('/admin/article/{id}/edit', "ProjetPHP\Controller\AdminController::editChapterAction")
->bind('admin_chapter_edit');

// Remove a chapter
$app->get('/admin/article/{id}/delete', "ProjetPHP\Controller\AdminController::deleteChapterAction")
->bind('admin_chapter_delete');

// Edit an existing comment
$app->match('/admin/comment/{id}/edit', "ProjetPHP\Controller\AdminController::editCommentAction")
->bind('admin_comment_edit');

// show comment by chapter
$app->match('/admin/comment/{id}/show', "ProjetPHP\Controller\AdminController::commentByChapterAction")
->bind('admin_comment_show');

// Remove a comment
$app->get('/admin/comment/{id}/delete', "ProjetPHP\Controller\AdminController::deleteCommentAction")
->bind('admin_comment_delete');

// Add a user
$app->match('/admin/user/add', "ProjetPHP\Controller\AdminController::addUserAction")
->bind('admin_user_add');

// Edit an existing user
$app->match('/admin/user/{id}/edit', "ProjetPHP\Controller\AdminController::editUserAction")
->bind('admin_user_edit');

// Remove a user
$app->get('/admin/user/{id}/delete', "ProjetPHP\Controller\AdminController::deleteUserAction")
->bind('admin_user_delete');