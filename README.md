**Installation**

Add the following json object into the composer.json's  repository object file

```
"repositories": [
        {
            "type": "vcs",
            "url": "https://bitbucket.org/zulu-dev/cqrs-core"
        }
    ],
```

* Then require the package `zulu/cqrs: 'dev-master'` in composer.json and do a composer update

    *** You need a bitbucket consumer key in order to access this repository (https://confluence.atlassian.com/bitbucket/oauth-on-bitbucket-cloud-238027431.html)

* Finally add `Zulu\Cqrs\CoreServiceProvider::class`  into the app config 

**Initiating Project**

`` php artisan init:project <project-name>``

**Module creation**

 `` php artisan make:module ``
 
 
 **Command creation**
 
  `` php artisan make:cqrs:command <command-name> ``
 
 * As a convention, append Command postfix end of every command (Ex: SampleCommand)
  
**Query creation**

`` php artisan make:cqrs:query <cquery-name> ``

* As a convention, append Query postfix end of every query (Ex: SampleQuery)

**Repository creation**

`` php artisan make:repository <repository-name> ``

* As a convention, append Repository postfix end of every repository (Ex: SampleRepository)
