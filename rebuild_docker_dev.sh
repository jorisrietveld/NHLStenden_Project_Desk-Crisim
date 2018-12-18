#!/usr/bin/env bash
DATABASE_URL "mysql://db_user:db_password@127.0.0.1:3306/db_name";
docker run --rm -v $(pwd):/app composer install