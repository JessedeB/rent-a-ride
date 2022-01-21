### RENT-A-RIDE

Welcome to rent-a-ride, a website including a administration dashboard using the Laravel framework.
We created this project so people can contribute and learn the Laravel framework, from beginners to more advanced users.

# Projects tab
Within the projects tab above, a simple kanban board is shown. Within this board, you'll see the current state of the project.
ONLY pick new items when your current one has been completed and approved by @JessedeB.
ONLY add new items to the list in coordination with @JessedeB
IF an item is already open for a while, contact the group ( or @JessedeB ) if you can pick up the item.

## Rules
1. DO NOT push directly into the main branch, for each feature create a branch and do a pull request with @JessedeB as reviewer
2. Don't start of a new feature instantly, discuss this with @JessedeB
3. Work with eachother, not against eachother.
4. DO NOT accept incomming pull request, only @JessedeB is allowed to do this.
5. DO NOT comment someone else's feature without discussing this with @JessedeB
6. DO NOT delete files or code without permission from @JessedeB
7. DO NOT change the project structure without discussing this with @JessedeB
8. IF being stuck, or having a question. PLEASE create an issue!

If any of the above rules are broken, you will be kicked out of the team and won't be able to participate in any other project.

## Project structure
The current setup isn't finished YET, this will be the project structure for now :

----------------------
- App
    - Actions
    - Console
    - Exceptions
    - Http
    - Models
    - Providers
    - Services
- Resources
    - views
    - auth
    - components
    - layouts
        - partials
        - site ( main website views )
        - dashboard ( user and admin dashboard )
        
## How do i start with a feature?
1. Create an simple overview, think about the feature widely.
2. Create a database diagram ( tablename, columns, primary / foreign keys, unique, constraints etc. ) and show this to @JessedeB
3. Create a class diagram, what controllers / models / services etc. do you think the feature needs, discuss this with @JessedeB
4. Implement the feature
5. Create a pull request, and assign @JessedeB as reviewer

## Packages used
More packages will be implemented later on, this list needs to be up-to-date

## NPM
- "@popperjs/core": "^2.10.2",
- "axios": "^0.21",
- "bootstrap": "^5.1.3",
- "laravel-mix": "^6.0.6",
- "lodash": "^4.17.19",
- "postcss": "^8.1.14",
- "resolve-url-loader": "^5.0.0",
- "sass": "^1.32.11",
- "sass-loader": "^11.0.1"

## Composer
- "php": "^7.3|^8.0",
- "fruitcake/laravel-cors": "^2.0",
- "guzzlehttp/guzzle": "^7.0.1",
- "laravel/framework": "^8.75",
- "laravel/sanctum": "^2.11",
- "laravel/tinker": "^2.5",
- "laravel/ui": "^3.4"

DEV
- "facade/ignition": "^2.5",
- "fakerphp/faker": "^1.9.1",
- "laravel/sail": "^1.0.1",
- "mockery/mockery": "^1.4.4",
- "nunomaduro/collision": "^5.10",
- "phpunit/phpunit": "^9.5.10"
