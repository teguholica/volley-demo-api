<?php require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function () {
    echo "This is used to create volley demo";
});

$app->get('/json_object', function () use ($app) {
	$app->response->headers->set('Content-Type', 'application/json');
	$data['name'] = 'Teguh Arifianto';
	$data['email'] = 'teguholica@gmail.com';
    echo json_encode($data);
});

$app->get('/json_array', function () use ($app) {
	$app->response->headers->set('Content-Type', 'application/json');
	$data = [
		['name' => 'Teguh Arifianto', 'email' => 'teguholica@gmail.com'],
		['name' => 'Anita Sari', 'email' => 'notkeyend@gmail.com'],
		['name' => 'Ihsan Faeyza Mufid', 'email' => 'ihsan@mailinator.com'],
	];
    echo json_encode($data);
});

$app->get('/string', function () use ($app) {
    echo "This is string content";
});

$app->get('/header', function () use ($app) {
	$app->response->headers->set('Content-Type', 'application/json');
	$data['apikey'] = $app->request->headers->get('apikey');
    echo json_encode($data);
});

$app->post('/post_json', function () use ($app) {
	$app->response->headers->set('Content-Type', 'application/json');
    echo $app->request->getBody();
});

$app->post('/post_urlencode', function () use ($app) {
	$app->response->headers->set('Content-Type', 'application/json');
	$data['name'] = $app->request->post('name');
	$data['email'] = $app->request->post('email');
	$data['password'] = $app->request->post('password');
    echo json_encode($data);
});

$app->get('/cancel_single_request', function () use ($app) {
	sleep(5);
    echo 'Finish From Server';
});

$app->run();