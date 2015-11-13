<h1>Hi, {{ $user }}!</h1>
 
<p>We'd like to personally welcome you to the Laravel 4 Authentication Application. Thank you for registering!</p>
{{ $confirmation_url }}
<a href="<?php echo $confirmation_url;?>">Click Here</a>