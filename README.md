# Test API for work with cache (Redis, Memcached)

## Features

- Redis, RoutingComponent, ViewComponent

## Project

1. API
   ```
   app/controllers/api/...
   
   api/get-all
   api/add
   api/delete
   ```

2. Components
   ```
   app/components/...
   
   1. RoutingComponent
   2. ViewComponent
   
   Cache Folder
   3. RedisComponent
   4. MemcachedComponent (Not implemented)
   ```
   
3. Command
    ```
    File command.php
    ADD:     $ command.php redis add {key} {value}
    DELETE:  $ command.php redis delete {key}
    ```
