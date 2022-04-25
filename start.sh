#!/bin/bash

# Name of main laravel container
NAME="laravel.test"

# If the container is already running
if docker ps | grep -q $NAME
then

  echo "The project appears to already be running."
  echo -n "Would you like to attempt to start anyway? (Y/n) "
  read START

  # If the user wants to attempt to start it anyway
  if [ "$START" ] && [[ $START == "n" ]]
  then
    exit 0
  fi
fi

# Start up project
./vendor/bin/sail up -d
