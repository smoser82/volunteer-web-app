# Volunteer Web App

Created by Christopher Cox, Robert Eisner, Joshua Morford, Susanna Moser, and Evan Wells

This application acts as a way to advertise events that need volunteers to potential volunteers. Event planners can create event descriptions that  volunteers can see, and volunteers can confirm that they will help with an event using this application.

This application is currently a work in progress and most features are not implemented yet.

## Setting up the development environment

This section assumes that you have WSL 2.0 enabled on your machine, a Linux distribution installed and configured as your default WSL installation, Git installed, and Docker installed and configured to use WSL 2.0.

To prepare the devopment environment:
1) Go to whatever folder you want the Git repo in and run `git clone https://github.com/smoser82/volunteer-web-app.git` to clone the repo
2) Create a different temporary folder somewhere else, open a terminal in that temporary folder, and enter WSL by running the command `wsl`
3) Run the command `curl -s https://laravel.build/volunteer-web-app | bash`
4) Copy all of the files from the folder "volunteer-web-app" that was just created in the temporary folder into the folder "volunteer-web-app" in the git repo folder, and if it asks what to do with file conflicts, choose to skip them

After this, you should be able to delete the temporary folder and all of its contents from step 2.

To launch the development environment:
1) Configure the .env file
2) Run the command `./vendor/bin/sail up` from the "volunteer-web-app" folder 

It will take several minutes to build the container for the first time, but it will be faster on subsequent attempts.

The application will be accessible at http://localhost/.

### Notes for configuring the development environment
If WSL claims that Docker is not running when you attempt to start the development environment:
1) Open Docker's settings
2) Under "General" make sure that "Use the WSL 2.0 based engine" is checked
3) Under "Resources > WSL Integration" make sure that "Enable integration with my default WSL distro" is checked and, if applicable, your installed WSL distribution is also checked under "Enable integration with additional distros:"
