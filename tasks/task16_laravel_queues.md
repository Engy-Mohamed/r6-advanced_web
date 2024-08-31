<h1>What are Laravel Queues?</h1>
<h3>Laravel Queues provide a unified API for deferring tasks to a later time,</h3>

<p>It is allowing you to perform resource-intensive tasks in the background without affecting the user experience. By moving tasks such as email sending or feed processing to a queue, you can respond to user requests quickly, while the server works through the queued jobs at its own pace.</p>

<h1>Connections vs. Queues</h1>
<p>The connections to backend queue services such as Amazon SQS, Beanstalk, or Redis. However, any given queue connection may have multiple "queues" which may be thought of as different stacks or piles of queued jobs.<br>
Note that each connection configuration example in the queue configuration file contains a queue attribute. This is the default queue that jobs will be dispatched to when they are sent to a given connection. In other words, if you dispatch a job without explicitly defining which queue it should be dispatched to, the job will be placed on the queue that is defined in the queue attribute of the connection configuration:
</p>
<h1>Setting Up a Queue</h1>
<h3>Laravel supports various queue backends like Redis, Amazon SQS, and database-driven queues</h3>
<h4>Set up a database queue</h4>
<p>1- create a migration for the jobs table:</p>
<pre class="shiki shiki-themes github-light github-dark" style="background-color:#fafafa , color:#000000"><code>php artisan queue:table
<br>php artisan migrate</code></pre>
<br>
<p>2- update your .env file to use the database queue driver</p>
<pre class="shiki shiki-themes github-light github-dark" style="background-color:#fafafa , color:#000000"><code>BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120</code></pre>
<h4>Creating Jobs</h4>
<p>In Laravel, queued tasks are represented as "Jobs." You can generate a new job class using the command:</p>
<pre class="shiki shiki-themes github-light github-dark" style="background-color:#fafafa , color:#000000"><code>php artisan make:job SendNewPostNotification</code></pre>
<h4>Dispatching Jobs</h4>
<p>Once you've created your job, dispatching it is simple. You can dispatch a job from anywhere in your application, such as from a controller method</p>
<pre class="shiki shiki-themes github-light github-dark" style="background-color:#fafafa , color:#000000"><code>use App\Jobs\SendNewPostNotification;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {

		// Other stuff

        // Store the blog post...
        $post = Post::create($request->all());

        // Dispatch the job to send the notification
        SendNewPostNotification::dispatch($post);



        // Other stuff
    }
}</code></pre>
<h4>Running the Queue Worker</h4>
<p>Laravel includes an Artisan command that will start a queue worker and process new jobs as they are pushed onto the queue.<br> Note that once the queue:work command has started, it will continue to run until it is manually stopped or you close your terminal:</p>
<br>
<p>To process the jobs in your queue, you need to run the queue worker. You can start the worker with the command:</p>
<pre class="shiki shiki-themes github-light github-dark" style="background-color:#fafafa , color:#000000"><code>php artisan queue:work</code></pre>
<p>For production environments, you should configure a process monitor to ensure that the queue worker does not stop running.</p>
<br>
<p>You may include the -v flag when invoking the queue:work command if you would like the processed job IDs to be included in the command's output:</p>
<pre class="shiki shiki-themes github-light github-dark" style="background-color:#fafafa , color:#000000"><code>php artisan queue:work -v</code></pre>
<p>You can define the maximum number of attempts before the job is logged as failed:</p>
<pre class="shiki shiki-themes github-light github-dark" style="background-color:#fafafa , color:#000000"><code>php artisan queue:work --tries=3</code></pre>
<h4>Handling Failed Jobs</h4>
<p>Laravel provides a way to handle failed jobs by inserting them into a failed_jobs table. To create this table, run:</p>
<pre class="shiki shiki-themes github-light github-dark" style="background-color:#fafafa , color:#000000"><code>php artisan queue:failed-table
php artisan migrate</code></pre>
<h2>queue:work vs. queue:listen</h2>
<p>Queue workers are long-lived processes and store the booted application state in memory. As a result, they will not notice changes in your code base after they have been started. So, during your deployment process, <strong>be sure to restart your queue workers.</strong></p>
<p> When using the queue:listen command, <strong>you don't have to manually restart the worker</strong> when you want to reload your updated code or reset the application state; however, this command is significantly less efficient than the queue:work command:</p>
<h2>Running Multiple Queue Workers</h2>
<p>To assign multiple workers to a queue and process jobs concurrently, you should simply start multiple queue:work processes<br>
This can either be done locally via multiple tabs in your terminal or in production using your process manager's configuration settings. When using Supervisor, you may use the numprocs configuration value.</p>