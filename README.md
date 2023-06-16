# A Code Challenge (free labor).


- Unit Tests are located in the  /tests directory. Run phpunit from the base dir

## How to run this:
  - Make sure Docker is installed on your local machine.
  - Clone this repo.

### Start the container
  - docker run -d docupet_bin

### Once it's up and running, you can run this from terminal:
- docker exec -it docupet_bin php application pet-bin {width|frequency}

A JSON encoded array will be returned on the command line.
 
