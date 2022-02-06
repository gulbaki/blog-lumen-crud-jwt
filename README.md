Php-lumen + Mysql + JSON Web Token Authentication + Crud Operations
====================================================

Preparation
------------
```
composer install
```

Starting application
--------------------
```
 php -S localhost:8000 -t public
```


API endpoints
--------------------
  
`/api/register` Post - Register user.

`/api/login` Post - Login user.

`/api/profile` Get - User profile.

`/api/users/{id}` Get - Single user.

`/api/users` Get - All user.

`/api/blogs` Get - All blogs.

`/api/blog` Post - Create blog.

`/api/blog/{id}` Get - Single blog.

`/api/blog/{id}` Put - Put Blog.

`/api/blog/{id}` Delete - Delete Blog.


