#Generic simple framework for PHP 7
The main idea behind this project is to have a simple framework that gives the full control on any part of application, but at the same time creates a scaffold for a modern MVC application and implements most basic tasks.

It utilizes as less 3rd party packages as possible. Most dependencies are optional and can be easily removed. All initializations and processing are transparent and small.

In further development I will try to reduce number of dependencies even more.

#How to use?
It works as a boilerplate. Just clone it and build your project on top of it.

#Features
- Dependency injection
- Routes
- ORM agnostic (this example uses Propel)
- Exception handling
- Events handling
- Template rendering
- Easy JSON responses
- User authentication (this example uses JWT)

#In development
- Caching
- Cloud storage
- Forms
- Message queues
- Console commands
- Cron management

#Lib \ App separation
- Lib includes interfaces and very general classes, most of them extendable. Highly reusable patterns. No logic.
- App includes all business logic, interfaces implementation.