<?php

use models\Students;

// Get all students
$app->get('/students', function () use ($app) {	
	$o = new Students();
	$students = $o->getAll();
	$app->contentType('application/json');
	echo json_encode($students);
});

// Gets a specific student
$app->get('/students/:id', function ($id) use ($app) {	
	$o = new Students();
	$students = $o->getById($id);
	$app->contentType('application/json');
	echo json_encode($students);
});

// Inserts a student
$app->post('/students', function () use ($app) {	
	$post_data = json_decode($app->request()->getBody(), true);
	$oStudent = new Students ();
	echo $oStudent->insert($post_data);
});

// Updates a student
$app->put('/students/:id', function ($id) use ($app) {
	$post_data = json_decode($app->request()->getBody(), true);
	//echo $post_data['score'];
	$oStudent = new Students ();
	echo $oStudent->update($post_data,$id);
});

// Deletes a student
$app->delete('/students/:id', function ($id) use ($app) {	
	$oStudent = new Students ();
	echo $oStudent->delete($id);
});
