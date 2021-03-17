
# stop all running containers
echo '####################################################'
echo 'Stopping running containers (if available)...'
echo '####################################################'
docker stop $(docker ps -aq)

# stop all running containers
echo '####################################################'
echo 'Unbind Ports'
echo '####################################################'
#
#for var in "$@"
#do
#    sudo fuser -k $var/tcp &
#done

## Start docker containers
sudo docker-compose up -d