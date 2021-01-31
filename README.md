# Symfony Api Tutorial

Implementación de un ToDo list usando filosofia TDD y arquitectura hexagonal.

### 🐳 Needed tools

1. [Install Docker](https://www.docker.com/get-started)

### ✅ Tests execution

1. Install the dependencies if you haven't done it previously: `make deps`
2. Execute PHPUnit and Behat tests: `make test`

Libraries:

1. [Phpunit](https://phpunit.de/)
2. [Symfony 5](https://symfony.com/)
3. [PHP Doctrine Collections](https://www.doctrine-project.org/projects/collections.html)
4. [The DependencyInjection Component](https://symfony.com/doc/current/components/dependency_injection.html)
5. [Lambdish Phunctional](https://github.com/Lambdish/phunctional)

### 🛠️ Environment configuration

1. Create a local environment file (`cp .env .env.local`) if you want to modify any parameter

### 🔥 Application execution

1. Install all the dependencies and bring up the project with Docker executing: `make build`
2. Then you'll have the app available:
  1. [Backend](src): http://localhost:8030/health-check

### 💎 Code quality tools

1. Execute code quality tools `make quality`
1. [Psalm](https://github.com/vimeo/psalm) 
