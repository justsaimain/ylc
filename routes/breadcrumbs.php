<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Student Dashboard
Breadcrumbs::for('student', function ($trail) {
    $trail->push('Dashboard', route('student'));
});

Breadcrumbs::for('student.enrolled', function ($trail) {
    $trail->parent('student');
    $trail->push('Your Courses', route('student.enrolled'));
});

Breadcrumbs::for('student.course', function ($trail, $course) {
    $trail->parent('student.enrolled');
    $trail->push($course->name, route('student.course', $course->course_code));
});

Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});

// // Home > Blog
// Breadcrumbs::for('blog', function ($trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });
