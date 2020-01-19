# Okapi

Design methodology that consists in seeding a development database with sample fake data while designing it at the same time.

---

### Set up the Environment

    bash/dev/start.sh

### Update the Database Schema

    docker exec -itu 1000:1000 okapi_php_fpm php bin/console doctrine:migrations:diff
    docker exec -itu 1000:1000 okapi_php_fpm php bin/console doctrine:migrations:migrate

### Load the Fixtures

    docker exec -itu 1000:1000 okapi_php_fpm php bin/console doctrine:fixtures:load

### To Do

    ...

### Contributions

Would you help make this app better?

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "Okapi"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)

Thank you.
