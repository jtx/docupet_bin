# Docupet Code Test

-This is for the Code Test. It's over-engineered on purpose.  Check app/Services and app/Filters for the code

-Unit Tests are obviously gonna be in the /tests directory. Just run phpunit from the base dir

## How to run this:

### Very first....
  - Make sure Docker is installed on your local machine.
  - Clone this repo. I'm hoping you know how to do that.

### Start the container
  - docker run -d docupet_bin

### Once it's up and running, you can run this from terminal:
- docker exec -it docupet_bin php application pet-bin {width|frequency}

Based on the PDF doc for the code test details, width / frequency should be self explanatory.  The console command will
return a JSON endoded array, because... Why not?
 
