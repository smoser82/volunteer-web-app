#!/bin/bash

# Name of main laravel container
NAME="php-laravel"

# If the container is already running
if docker ps | grep -q $NAME
then
  # Stop laravel containers
  ./vendor/bin/sail down
else
  # The container is not running
  echo "The project does not appear to be running."
  echo -n "Would you like to attempt to stop anyway? (y/N) "
  read STOP

  # If the user wants to attempt to stop it anyway
  if [ "$STOP" ] && [[ $STOP == "y" ]]
  then
    # Stop laravel containers
    ./vendor/bin/sail down
  fi
fi
