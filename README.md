# php-mvc

A basic, and yet modern, MVC implementation.

Run 'composer install' to put in composer and set up the autoloader

Then you can run this with public as the DocumentRoot in apache, or run 'php -S localhost:8000' in
the public directory.

```
├── composer.json
├── public
│   └── index.php
├── README.md
├── src
│   ├── Application.php
│   ├── Controller
│   │   ├── Error.php
│   │   └── Index.php
│   ├── Model
│   │   ├── Request.php
│   │   └── Response.php
│   └── View.php
└── views
    ├── default.phtml
    ├── footer.phtml
    └── header.phtml
```

```
public/index         - Code entrypoint
src/Application      - Routing and basic logic
src/Controller/Error - Error handler, basic output for 404 and 500
src/Controller/Index - Basic controller for the root page
src/Model/Request    - Request model, for accessing any request data
src/Model/Reponse    - Response model, for setting the response
src/View             - A general view for rendering templates
views/default.phtml  - The basic template
views/header.phtml   - Header template
views/footer.phtml   - Footer template
```

