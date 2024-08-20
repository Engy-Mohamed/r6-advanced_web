<h1>Laravel - Middleware</h1>
<h3>Middleware acts as a bridge between a request and a response. It is a type of filtering mechanism</h3>

<p> For example, Laravel includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to your application's login screen. 
<br>Additional middleware can be written to perform a variety of tasks besides authentication. For example, a logging middleware might log all incoming requests to your application. A variety of middleware are included in Laravel, including middleware for authentication and CSRF protection; however, all user-defined middleware are typically located in your application's app/Http/Middleware directory.</p>

<h2>Global Middleware</h2>
<p>
If you want a middleware to run during every HTTP request to your application, you may append it to the global middleware stack in your application's bootstrap/app.php file:
</p>
<h2>Route Middleware</h2>
<p>If you would like to assign middleware to specific routes, you may invoke the middleware method when defining the route:
</p>
<h2>Laravel's Default Middleware Groups</h2>
<p>Laravel includes predefined<strong> web and api </strong>middleware groups that contain common middleware you may want to apply to your web and API routes. Remember, Laravel automatically applies these middleware groups to the corresponding routes/web.php and routes/api.php files</p>