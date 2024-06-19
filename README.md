<div align="center">
  <h1 align="center">Shopfully API Flyers</h1>
</div>

<br/>

This backend service provides APIs to retrieve data on promotional flyers. It supports pagination and returns flyer details such as title, dates, publication status, retailer, and category. The available endpoints are:

- **GET - Complete list of flyers:** /api/flyers
- **GET - Paginated list of flyers:** /api/flyers?page=1&limit=100
- **GET - Flyer details:** /api/flyers/{id}

## Tech Stack

- [Laravel](https://laravel.com/) – Framework
- [PHP](https://www.php.net/) – Language

## Getting Started

### Prerequisites

Here's what you need to be able to run Shopfully API Flyers:

- Docker 🐳

#### Tools

The docker-compose offers you all the tools to install the site and to develop: PHP, Composer, NPM, and Artisan.

- **PHP**
```sh
docker-compose run --rm php ...
```

- **Composer**
```sh
docker-compose run --rm composer ...
```

- **Artisan**
```sh
docker-compose run --rm artisan ...
```

### Installation

#### 1. Clone the repository

```shell
git clone https://github.com/PasqualeBassolillo/shopfully-project-backend.git
```

#### 2. Move to the project folder

```shell
cd shopfully-project-backend
```

#### 3. Install the PHP dependencies

```shell
docker-compose run --rm composer install
```

#### 4. Run the service

```shell
docker-compose up -d --build app
```

## Usage

Now we are ready to go! The APIs are accessible at [http://localhost:8000](http://localhost:8000).

You can use tools like `curl` or Postman to interact with these endpoints and retrieve flyer data.

### Example Request

To get the full list of flyers, you can use the following `curl` command:

```sh
curl -X GET http://localhost:8000/api/flyers
```

## Goals
- [X] API
  - [x] To show all flyers
  - [x] To show flyers with pagination

# Conclusion

With the backend service up and running, you can now access the flyers API at [http://localhost:8000](http://localhost:8000). This setup allows you to retrieve and manage promotional flyers efficiently.

Thank you for using the Flyers Management Backend service!
<br>
<br>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr style="border-bottom: 1px solid #efefef;">
    <td width="506" border=0>
      Copyright © Pasquale Bassolillo, 2024
    </td>
    <td align="right" width="506">
      <span>
        <a href="https://www.linkedin.com/in/pasquale-bassolillo-823900161/">
          <img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white"
            alt="LinkedIn" />
        </a>
      </span>
      <span>
         <img src="#"
            width="20" height="1" />
      </span>
      <span>
        <a href="https://github.com/PasqualeBassolillo">
          <img src="https://img.shields.io/badge/GitHub-171515?style=for-the-badge&logo=github&logoColor=white"
            alt="GitHub" />
        </a>
      </span>
    </td>
  </tr>
</table>