Noémie Doge Website 2023
========================
A WordPress powered website with a custom theme based on [BlankSlate](https://wordpress.org/themes/blankslate/).

<center>
  <a href="https://2023.noemiedoge.com">Staging</a>
  ·
  <a href="https://www.noemiedoge.com">Production</a>
</center>

## Requirements
 * Docker

## Installation

```bash
$ cp docker-compose.override-example.yml docker-compose.override.yml
$ vim docker-compose.override-example.yml

$ docker-compose up -d --build
```

Then go to [localhost:8080](http://localhost:8080).

## Pull production DB
Run the following script to get a fresh copy of the production database:

```bash
./scripts/prod-db-to-docker.sh
```

## Deployment
The deployment is simple: a Githun Action is doing a rsync of the theme folder on the staging or production server.

All plugins and configuration need to be installed manually.
