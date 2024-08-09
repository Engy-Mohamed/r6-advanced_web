<h1>Path Traversal</h1>
<h3>This attack is also known as “dot-dot-slash”, “directory traversal”, “directory climbing” and “backtracking”</h3>

<p>A path traversal attack (also known as directory traversal) aims to access files and directories that are stored outside the web root folder. 
<br>By manipulating variables that reference files with “dot-dot-slash (../)” sequences and its variations or by using absolute file paths,<br> it may be possible to access arbitrary files and directories stored on file system including application source code or configuration and critical system files</p>

<h1>Double Encoding</h1>

<p>
This attack technique consists of encoding user request parameters twice in hexadecimal format in order to bypass security controls or cause unexpected behavior from the application.<br>It’s possible because the webserver accepts and processes client requests in many encoded forms.
<br>Attackers can inject double encoding in pathnames or query strings to bypass the authentication schema and security filters in use by the web application.
</p>