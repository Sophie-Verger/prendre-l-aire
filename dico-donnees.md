# Dictionnaire de données

## area ('area')

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|identifiant de l'aire de repos|
|name|VARCHAR(32)|NOT NULL|Le nom de l'aire de repos|
|zip code|TINYINT|NOT NULL|code postal de la ville rattachée à l'aire de repos|
|city|VARCHAR(32)|NOT NULL|ville rattachée à l'aire de repos|
|kilometers|DECIMAL(5,2)|NOT NULL|kilomètre où se situe l'aire de repos|
|direction|VARCHAR(32)|NOT NULL|sens de l'aire de repos sur l'autoroute|
|latitude|DECIMAL(10,6)|NOT NULL, UNSIGNED|latitude de l'aire de repos|
|longitude|DECIMAL(10,6)|NOT NULL, UNSIGNED|longitude de l'aire de repos|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création du label|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du label|
|gas_station_id|entity|NULL|le nom de la station de carburant (autre entité)|
|highway_id|entity|NOT NULL|le numéro d'autoroute (autre entité) sur lequel l'aire est rattachée|

## service ('service')

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Identifiant du service|
|name|VARCHAR(32)|NOT NULL|Le nom du service|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création du service|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du service|

## gas type ('gas_type')

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Identifiant du type de carburant|
|name|VARCHAR()|NOT NULL|Le nom du type de carburant|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création du carburant|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du carburant|

## gas station ('gas_station')

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Identifiant de la station service|
|name|VARCHAR(32)|NOT NULL|Le nom de la station service|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création de la station service|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la station service|

## gas price ('gas_price')

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Identifiant de la relation entre le carburant, son prix et l'aire|
|price|DECIMAL|NOT NULL|prix du carburant|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création de la station service|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la station service|
|area_id|entity|NOT NULL|aire (autre entité)|
|gas_type_id|entity|NOT NULL|nom du carburant (autre entité)|

## comment ('comment')

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Identifiant du commentaire|
|description|TEXT|NOT NULL|Le nom du commentaire|
|picture|VARCHAR(128)|NULL|Image du commentaire|
|rate|TINYINT(1)|NULL|note donnée à l'aire d'autoroute|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création du commentaire|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du commentaire|
|user_id|entity|NOT NULL|le user (autre entité) qui a fait le commentaire|
|area_id|entity|NOT NULL|l'aire (autre entité) auquelle le commentaire est rattaché|

## user ('user')

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Identifiant de l'utilisateur|
|username|VARCHAR(32)|NOT NULL|Le pseudo de l'utilisateur|
|email|VARCHAR(64)|NOT NULL|Le pseudo de l'utilisateur|
|password|VARCHAR(64)|NOT NULL|Le pseudo de l'utilisateur|
|role|VARCHAR(64)|NOT NULL|Le role de l'utilisateur|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création de l'utilisateur|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de l'utilisateur|

## highway ('highway')

le user (autre entité) qui a fait le commentaire
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Identifiant de l'autoroute|
|name|VARCHAR(32)|NOT NULL|Le nom de l'autoroute|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création de l'autoroute|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de l'autoroute|

## restaurant ('restaurant')

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Identifiant du restaurant|
|name|VARCHAR(32)|NOT NULL|Le nom du restaurant|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création du restaurant|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du restaurant|
