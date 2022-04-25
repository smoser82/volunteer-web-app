#!/bin/bash

# Name of main laravel container
NAME="php-laravel"

# If the container is already running
if docker ps | grep -q $NAME
then

  echo "The project appears to already be running."
  echo -n "Would you like to attempt to start anyway? (y/N) "
  read START

  # If the user wants to attempt to start it anyway
  if [ "$START" ] && [[ $START == "y" ]]
  then
    # Start up project
    ./vendor/bin/sail up -d
  else
    # End script
    exit 0
  fi
else
  # Start up project
  ./vendor/bin/sail up -d
fi
