# Co to má dělat?

Tento projekt poskytuje API server se dvěma endpointy pro správu a načítání příspěvků uživatelů. API podporuje různé typy příspěvků, včetně textových a audio příspěvků, a je postaveno pomocí frameworku Laravel s databází SQLite.

## Endpointy

### 1. Získání tokenu

URL: /api/login

Metoda: POST


Parametry:

    •   password (string) - Heslo 
    •   email (string) - Email

Příklad:

```sh
curl -X POST http://localhost:8000/api/login \
-H "Content-Type: application/json" \
-d '{
     "password" : "password",
     "email" : "test@example.com"
}'
```

User je vytvořený přes UserSeeder

### 2. Uložení příspěvku

URL: /api/posts

Metoda: POST

Parametry:

Pro textový příspěvek:

	•	author (string) - Autor příspěvku
	•	title (string) - Titulek příspěvku
	•	published_at (datetime) - Datum publikace
	•	text (string) - Text příspěvku
	•	excerpt (string) - Perex příspěvku

Pro audio příspěvek:

	•	author (string) - Autor příspěvku
	•	title (string) - Titulek příspěvku
	•	published_at (datetime) - Datum publikace
	•	audio_length (integer) - Délka audia v sekundách
	•	audio_url (string) - URL odkaz na audio soubor
	•	excerpt (string) - Perex příspěvku

Příklad:

```sh
curl -X POST http://localhost:8000/api/posts \
-H "Authorization: Bearer {your_token}" \
-H "Content-Type: application/json" \
-d '{
    "author": "Jan Novák",
    "title": "Můj první příspěvek",
    "published_at": "2024-07-31 12:00:00",
    "text": "Toto je text příspěvku.",
    "excerpt": "Krátký úvod do textu."
}'
```


### 3. Výpis všech příspěvků uživatele

URL: /api/posts/{user_id}

Metoda: GET

Autentizace: Nepožadována

Parametry:

	•	user_id (integer) - ID uživatele


Příklad:

```sh
curl -X GET http://localhost:8000/api/posts/1
```



## Licence

Tento projekt je licencován pod MIT licencí - podívejte se na soubor [LICENSE](LICENSE) pro detaily.
