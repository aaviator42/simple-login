# simple-login
Simple login system, to demonstrate [Sesher](https://github.com/aaviator42/Sesher) usage. 
You probably shouldn't use this in production without making some changes.

Chuck `index.php` and `Sesher.php` on a server and play around.

Uses a hardcoded hash for authentication. Default password is `password1234`. Replace with any `BCRYPT` hash generated with `password_hash()`. See [this](https://github.com/aaviator42/hashgen) script to make this process easy.

License: `AGPLv3`.
