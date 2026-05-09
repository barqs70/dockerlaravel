## Step

git clone

cd /

docker compose up -d

docker exec app composer install

docker exec app php aritsan migrate

