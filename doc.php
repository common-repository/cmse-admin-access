<?php
_e('
<p>This will create a secret path to the login area so that any direct path to wp-admin or wp-login.php will be redirected to the home page. Whatever you use in
the field below will be the path to the admin. <span style="color:red;"><b>Example:</b></span> If you enter <b>adminaccess</b>, the admin URL would then become
<span style="color:red;"><b>yoursite.com/adminaccess</b></span></p>

<p><b>You MUST first create the path. There are 2 optional ways to do this</b></p>

<p><b>Option 1.</b> <a href="post-new.php?post_type=page">Create a page</a> and insert a link to /wp-admin.
<span style="color:red;">&lt;a href="/wp-admin" rel="nofollow"&gt;Admin&lt;/a&gt;</span>
If you have template files included with your theme, you can assign the page to one. Otherwise it use the default. If you have the menu setup to automatically
add pages as menu items, you will need to remove the created page from the menu. With this option, it is likely that search bots will locate and possibly
cache the page. </p>

<p><b>Option 2.</b> Create a directory within the WordPress root and create an index.html file within that directory. Add the same hyperlink in the index.html.
With this method, if you forget the path, you can simply view your root directory and get the folder name.</p>
<p>In the field below, enter the name of the folder or the page created.</p>
', 'cmse-secret-admin');