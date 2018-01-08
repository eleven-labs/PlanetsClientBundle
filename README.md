# PlanetsClientBundle

Permet d'utiliser l'api du site des planets

# Installation 

```composer require eleven-labs/planets-client-bundle```

Puis dans les parameters.yml de votre projet vous avez besoin de

```yaml
    eleven_labs_planets_client.email: '%env(ELEVEN_LABS_EMAIL)%'
    eleven_labs_planets_client.password: '%env(ELEVEN_LABS_PASSWORD)%'
    eleven_labs_planets_client.client_id: '%env(ELEVEN_LABS_CLIENT_ID)%'
    eleven_labs_planets_client.client_secret: '%env(ELEVEN_LABS_CLIENT_SECRET)%'
```

Les noms sont assez simple :)

# Utilisation

Pour l'utilisation c'est assez simple vous avez accès au service suivant `eleven_labs_planets_client.api_client`

et pour le call c'est 

```php
 $this->get('eleven_labs_planets_client.api_client')->getApi($url);
```

Avec `$url` que vous pouvez trouver dans la documentation [ici](https://planets-bo.eleven-labs.com/api/doc)

