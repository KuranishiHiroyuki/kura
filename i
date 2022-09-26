
-----> Building on the Heroku-22 stack
-----> Using buildpacks:
       1. heroku/nodejs
       2. heroku/php
-----> Node.js app detected
       
-----> Creating runtime environment
       
       NPM_CONFIG_LOGLEVEL=error
       NODE_VERBOSE=false
       NODE_ENV=production
       NODE_MODULES_CACHE=true
       
-----> Installing binaries
       engines.node (package.json):  unspecified
       engines.npm (package.json):   unspecified (use default)
       
       Resolving node version 16.x...
       Downloading and installing node 16.17.1...
       Using default npm version: 8.15.0
       
-----> Installing dependencies
       Installing node modules
       
       added 779 packages, and audited 780 packages in 9s
       
       84 packages are looking for funding
         run `npm fund` for details
       
       4 vulnerabilities (3 high, 1 critical)
       
       To address all issues, run:
         npm audit fix
       
       Run `npm audit` for details.
       
-----> Build
       Running heroku-postbuild
       
       > heroku-postbuild
       > npm run prod
       
       
       > prod
       > npm run production
       
       
       > production
       > mix --production
       
Browserslist: caniuse-lite is outdated. Please run:
  npx browserslist@latest --update-db
  Why you should do it regularly: https://github.com/browserslist/browserslist#browsers-data-updating
       ℹ Compiling Mix
       
       [1;1H[0J
                                
          Laravel Mix v6.0.43   
                                
       
       ✔ Compiled Successfully in 11118ms
       ┌───────────────────────────────────┬──────────┐
       │                              File │ Size     │
       ├───────────────────────────────────┼──────────┤
       │                        /js/app.js │ 259 KiB  │
       │            /js/app.js.LICENSE.txt │ 2.26 KiB │
       │                    /js/app.js.map │ 1.53 MiB │
       │                    /js/confirm.js │ 87 bytes │
       │                       css/app.css │ 143 KiB  │
       │                   css/app.css.map │ 284 KiB  │
       └───────────────────────────────────┴──────────┘
       ✔ Mix: Compiled successfully in 11.16s
       webpack compiled successfully
       
-----> Caching build
       - npm cache
       
-----> Pruning devDependencies
       
       up to date, audited 1 package in 2s
       
       found 0 vulnerabilities
       
-----> Build succeeded!
-----> PHP app detected
-----> Bootstrapping...
-----> Preparing platform package installation...
-----> Installing platform packages...
       - php (8.1.10)
       - apache (2.4.54)
       - composer (2.4.1)
       - nginx (1.22.0)
       NOTICE: detected userland polyfill packages for PHP extensions
       NOTICE: now attempting to install native extension packages
       Installing extensions provided by symfony/polyfill-mbstring:
       - ext-mbstring... 
       Installing extensions provided by symfony/polyfill-iconv:
       - ext-iconv... 
       Installing extensions provided by symfony/polyfill-ctype:
       - ext-ctype... 
-----> Installing dependencies...
       Composer version 2.4.1 2022-08-20 11:44:50
       Installing dependencies from lock file
       Verifying lock file contents can be installed on current platform.
       Package operations: 76 installs, 0 updates, 0 removals
         - Downloading symfony/polyfill-php80 (v1.26.0)
         - Downloading symfony/deprecation-contracts (v3.1.1)
         - Downloading symfony/finder (v5.4.11)
         - Downloading symfony/polyfill-mbstring (v1.26.0)
         - Downloading symfony/var-dumper (v5.4.11)
         - Downloading psr/log (2.0.0)
         - Downloading maximebf/debugbar (v1.18.1)
         - Downloading voku/portable-ascii (1.6.1)
         - Downloading symfony/polyfill-ctype (v1.26.0)
         - Downloading phpoption/phpoption (1.9.0)
         - Downloading graham-campbell/result-type (v1.1.0)
         - Downloading vlucas/phpdotenv (v5.4.1)
         - Downloading symfony/css-selector (v6.1.3)
         - Downloading tijsverkoyen/css-to-inline-styles (2.2.5)
         - Downloading symfony/routing (v5.4.11)
         - Downloading symfony/process (v5.4.11)
         - Downloading symfony/polyfill-php72 (v1.26.0)
         - Downloading symfony/polyfill-intl-normalizer (v1.26.0)
         - Downloading symfony/polyfill-intl-idn (v1.26.0)
         - Downloading symfony/mime (v5.4.12)
         - Downloading symfony/polyfill-php73 (v1.26.0)
         - Downloading symfony/http-foundation (v5.4.12)
         - Downloading psr/event-dispatcher (1.0.0)
         - Downloading symfony/event-dispatcher-contracts (v3.1.1)
         - Downloading symfony/event-dispatcher (v6.1.0)
         - Downloading symfony/error-handler (v5.4.11)
         - Downloading symfony/http-kernel (v5.4.12)
         - Downloading symfony/polyfill-intl-grapheme (v1.26.0)
         - Downloading symfony/string (v6.1.4)
         - Downloading psr/container (1.1.2)
         - Downloading symfony/service-contracts (v2.5.2)
         - Downloading symfony/console (v5.4.12)
         - Downloading symfony/polyfill-iconv (v1.26.0)
         - Downloading doctrine/lexer (1.2.3)
         - Downloading egulias/email-validator (2.1.25)
         - Downloading swiftmailer/swiftmailer (v6.3.0)
         - Downloading symfony/polyfill-php81 (v1.26.0)
         - Downloading ramsey/collection (1.2.2)
         - Downloading brick/math (0.10.2)
         - Downloading ramsey/uuid (4.5.1)
         - Downloading psr/simple-cache (1.0.1)
         - Downloading opis/closure (3.6.3)
         - Downloading symfony/translation-contracts (v3.1.1)
         - Downloading symfony/translation (v6.1.4)
         - Downloading nesbot/carbon (2.62.1)
         - Downloading monolog/monolog (2.8.0)
         - Downloading league/mime-type-detection (1.11.0)
         - Downloading league/flysystem (1.1.9)
         - Downloading nette/utils (v3.2.8)
         - Downloading nette/schema (v1.2.2)
         - Downloading dflydev/dot-access-data (v3.0.1)
         - Downloading league/config (v1.1.1)
         - Downloading league/commonmark (2.3.5)
         - Downloading laravel/serializable-closure (v1.2.2)
         - Downloading webmozart/assert (1.11.0)
         - Downloading dragonmantank/cron-expression (v3.3.2)
         - Downloading doctrine/inflector (2.0.5)
         - Downloading laravel/framework (v8.83.24)
         - Downloading barryvdh/laravel-debugbar (v3.7.0)
         - Downloading asm89/stack-cors (v2.1.1)
         - Downloading fruitcake/laravel-cors (v2.2.0)
         - Downloading goodby/csv (1.3.0)
         - Downloading psr/http-message (1.0.1)
         - Downloading psr/http-client (1.0.1)
         - Downloading ralouphie/getallheaders (3.0.3)
         - Downloading psr/http-factory (1.0.1)
         - Downloading guzzlehttp/psr7 (2.4.1)
         - Downloading guzzlehttp/promises (1.5.2)
         - Downloading guzzlehttp/guzzle (7.5.0)
         - Downloading almasaeed2010/adminlte (v3.2.0)
         - Downloading jeroennoten/laravel-adminlte (v3.8.4)
         - Downloading laravel/sanctum (v2.15.1)
         - Downloading nikic/php-parser (v4.15.1)
         - Downloading psy/psysh (v0.11.8)
         - Downloading laravel/tinker (v2.7.2)
         - Downloading laravel/ui (v3.3.0)
         - Installing symfony/polyfill-php80 (v1.26.0): Extracting archive
         - Installing symfony/deprecation-contracts (v3.1.1): Extracting archive
         - Installing symfony/finder (v5.4.11): Extracting archive
         - Installing symfony/polyfill-mbstring (v1.26.0): Extracting archive
         - Installing symfony/var-dumper (v5.4.11): Extracting archive
         - Installing psr/log (2.0.0): Extracting archive
         - Installing maximebf/debugbar (v1.18.1): Extracting archive
         - Installing voku/portable-ascii (1.6.1): Extracting archive
         - Installing symfony/polyfill-ctype (v1.26.0): Extracting archive
         - Installing phpoption/phpoption (1.9.0): Extracting archive
         - Installing graham-campbell/result-type (v1.1.0): Extracting archive
         - Installing vlucas/phpdotenv (v5.4.1): Extracting archive
         - Installing symfony/css-selector (v6.1.3): Extracting archive
         - Installing tijsverkoyen/css-to-inline-styles (2.2.5): Extracting archive
         - Installing symfony/routing (v5.4.11): Extracting archive
         - Installing symfony/process (v5.4.11): Extracting archive
         - Installing symfony/polyfill-php72 (v1.26.0): Extracting archive
         - Installing symfony/polyfill-intl-normalizer (v1.26.0): Extracting archive
         - Installing symfony/polyfill-intl-idn (v1.26.0): Extracting archive
         - Installing symfony/mime (v5.4.12): Extracting archive
         - Installing symfony/polyfill-php73 (v1.26.0): Extracting archive
         - Installing symfony/http-foundation (v5.4.12): Extracting archive
         - Installing psr/event-dispatcher (1.0.0): Extracting archive
         - Installing symfony/event-dispatcher-contracts (v3.1.1): Extracting archive
         - Installing symfony/event-dispatcher (v6.1.0): Extracting archive
         - Installing symfony/error-handler (v5.4.11): Extracting archive
         - Installing symfony/http-kernel (v5.4.12): Extracting archive
         - Installing symfony/polyfill-intl-grapheme (v1.26.0): Extracting archive
         - Installing symfony/string (v6.1.4): Extracting archive
         - Installing psr/container (1.1.2): Extracting archive
         - Installing symfony/service-contracts (v2.5.2): Extracting archive
         - Installing symfony/console (v5.4.12): Extracting archive
         - Installing symfony/polyfill-iconv (v1.26.0): Extracting archive
         - Installing doctrine/lexer (1.2.3): Extracting archive
         - Installing egulias/email-validator (2.1.25): Extracting archive
         - Installing swiftmailer/swiftmailer (v6.3.0): Extracting archive
         - Installing symfony/polyfill-php81 (v1.26.0): Extracting archive
         - Installing ramsey/collection (1.2.2): Extracting archive
         - Installing brick/math (0.10.2): Extracting archive
         - Installing ramsey/uuid (4.5.1): Extracting archive
         - Installing psr/simple-cache (1.0.1): Extracting archive
         - Installing opis/closure (3.6.3): Extracting archive
         - Installing symfony/translation-contracts (v3.1.1): Extracting archive
         - Installing symfony/translation (v6.1.4): Extracting archive
         - Installing nesbot/carbon (2.62.1): Extracting archive
         - Installing monolog/monolog (2.8.0): Extracting archive
         - Installing league/mime-type-detection (1.11.0): Extracting archive
         - Installing league/flysystem (1.1.9): Extracting archive
         - Installing nette/utils (v3.2.8): Extracting archive
         - Installing nette/schema (v1.2.2): Extracting archive
         - Installing dflydev/dot-access-data (v3.0.1): Extracting archive
         - Installing league/config (v1.1.1): Extracting archive
         - Installing league/commonmark (2.3.5): Extracting archive
         - Installing laravel/serializable-closure (v1.2.2): Extracting archive
         - Installing webmozart/assert (1.11.0): Extracting archive
         - Installing dragonmantank/cron-expression (v3.3.2): Extracting archive
         - Installing doctrine/inflector (2.0.5): Extracting archive
         - Installing laravel/framework (v8.83.24): Extracting archive
         - Installing barryvdh/laravel-debugbar (v3.7.0): Extracting archive
         - Installing asm89/stack-cors (v2.1.1): Extracting archive
         - Installing fruitcake/laravel-cors (v2.2.0): Extracting archive
         - Installing goodby/csv (1.3.0): Extracting archive
         - Installing psr/http-message (1.0.1): Extracting archive
         - Installing psr/http-client (1.0.1): Extracting archive
         - Installing ralouphie/getallheaders (3.0.3): Extracting archive
         - Installing psr/http-factory (1.0.1): Extracting archive
         - Installing guzzlehttp/psr7 (2.4.1): Extracting archive
         - Installing guzzlehttp/promises (1.5.2): Extracting archive
         - Installing guzzlehttp/guzzle (7.5.0): Extracting archive
         - Installing almasaeed2010/adminlte (v3.2.0): Extracting archive
         - Installing jeroennoten/laravel-adminlte (v3.8.4): Extracting archive
         - Installing laravel/sanctum (v2.15.1): Extracting archive
         - Installing nikic/php-parser (v4.15.1): Extracting archive
         - Installing psy/psysh (v0.11.8): Extracting archive
         - Installing laravel/tinker (v2.7.2): Extracting archive
         - Installing laravel/ui (v3.3.0): Extracting archive
       Package swiftmailer/swiftmailer is abandoned, you should avoid using it. Use symfony/mailer instead.
       Generating optimized autoload files
       > Illuminate\Foundation\ComposerScripts::postAutoloadDump
       > @php artisan package:discover --ansi
       
       In Connection.php line 712:
                                                                                      
         SQLSTATE[42S02]: Base table or view not found: 1146 Table 'heroku_0216b145c  
         845d1a.items' doesn't exist (SQL: select * from `Items` where `Items`.`dele  
         ted_at` is null)                                                             
                                                                                      
       
       In Connection.php line 368:
                                                                                      
         SQLSTATE[42S02]: Base table or view not found: 1146 Table 'heroku_0216b145c  
         845d1a.items' doesn't exist                                                  
                                                                                      
       
       Script @php artisan package:discover --ansi handling the post-autoload-dump event returned with error code 1
 !     WARNING: An error occurred during a database connection or query
 !     ERROR: Dependency installation failed!
 !     
 !     The 'composer install' process failed with an error. The cause
 !     may be the download or installation of packages, or a pre- or
 !     post-install hook (e.g. a 'post-install-cmd' item in 'scripts')
 !     in your 'composer.json'.
 !     
 !     Typical error cases are out-of-date or missing parts of code,
 !     timeouts when making external connections, or memory limits.
 !     
 !     Check the above error output closely to determine the cause of
 !     the problem, ensure the code you're pushing is functioning
 !     properly, and that all local changes are committed correctly.
 !     
 !     For more information on builds for PHP on Heroku, refer to
 !     https://devcenter.heroku.com/articles/php-support
 !     
 !     REMINDER: the following warnings were emitted during the build;
 !     check the details above, as they may be related to this error:
 !     - An error occurred during a database connection or query
 !     Push rejected, failed to compile PHP app.
 !     Push failed
