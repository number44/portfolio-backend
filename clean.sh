#! /usr/bin/bash

systemctl stop postgresql
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)
docker volume rm $(docker volume ls -q)
