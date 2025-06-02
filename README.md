# adminer-prefilled-login-field

This Docker image is a wrapper for [Adminer](https://www.adminer.org/).
By specifying login information via environment variables, you can skip entering credentials on the login screen.

> **Note:** Use in production environments is not recommended.

## Features

- Specify DB connection information via environment variables
- Login fields are automatically prefilled on the login screen

## Usage

https://hub.docker.com/r/hotari/adminer-prefilled-login-field

Example `docker-compose.yml`:

```yaml
services:
    db-admin:
        image: hotari/adminer-prefilled-login-field
        ports:
            - 8080:8080
        environment:
            ADMINER_PLUGINS: prefilled-login-field
            ADMINER_DRIVER: server
            ADMINER_SERVER: db
            ADMINER_USERNAME: root
            ADMINER_PASSWORD: password
            ADMINER_DATABASE: database
```

## Environment Variables

| Variable Name       | Description                        |
|---------------------|------------------------------------|
| ADMINER_PLUGINS     | Adminer plugins to use             |
| ADMINER_DRIVER      | DB driver (e.g., server)           |
| ADMINER_SERVER      | DB server name                     |
| ADMINER_USERNAME    | DB username                        |
| ADMINER_PASSWORD    | DB password                        |
| ADMINER_DATABASE    | Database name                      |
