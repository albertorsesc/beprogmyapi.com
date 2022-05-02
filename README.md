<a href="https://ibb.co/LpxZfvk"><img src="https://i.ibb.co/XJ7CTV2/beprogmyapi.png" width="800" alt="BeProgMyApi, Progressive Metal Bands" border="0"></a>

### Be Prog My Api

#### API for obtaining Progressive Metal/Rock bands, albums, songs and other information.

<hr>

#### Roadmap

* [x] Register/Login
* [x] Get all Bands
* [x] Get all Genres
* [x] Create a Band
* [x] Add Album to Band
* [x] Get all Albums
* [] Get all Songs from an Album
* [] Add Members to a Band
* [] Add Song to an Album
* [] Create a Genre
* [] Create a Profile
* [] Befriend a User
* [] Like a Band

<hr>

#### Endpoints

[//]: # (| Resource       | HTTP     | Endpoint     | Description |)

[//]: # (| :------------- | :----------:  | -----------: | -----------: |)

[//]: # (|  Bands         | GET           | /api/bands    | Get all Bands |)

[//]: # (|  Albums         | GET           | /api/albums    | Get all Albums |)

[//]: # (|  Songs         | GET           | /api/albums/{album}/songs    | Get all Songs from an Album |)

[//]: # (|  Genres         | GET           | /api/genres    | Get all Genres |)

#### JSON Schema

**GET** - `/api/bands`
```json
{
    "data": [
        {
            "id": 1,
            "name": "Caligula's Horse",
            "country": {
                "id": 1,
                "name": "Australia",
                "code": "AU"
            },
            "genres": [
                {
                    "id": 1,
                    "name": "Progressive Rock"
                },
                {
                    "id": 2,
                    "name": "Progressive Metal"
                }
            ]
        }
    ]
}
```
<hr>

#### Installation

##### **Clone Repo**
`git clone https://github.com/albertorsesc/be-prog-my-api.git`

##### **Install Dependencies**
```
cd be-prog-my-api/
composer install
npm install
```

##### **Setup Environment**
```
cp .env.example .env
php artisan key:generate
```

##### **Setup DB credentials**
```
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

##### **Start Application**
- `npm run watch`
- `php artisan serve`

##### **Visit** `http://localhost:3000`
