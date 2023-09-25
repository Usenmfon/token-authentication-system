<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Token Authentication API Documentation

This documentation provides an overview of the endpoints and functionality of the API.

## System Requirements

- composer 2.2.21
- Php 8.1
- Laravel 10.10

## Test Credentials
- email: new@gmail.com
- password: new-user123
## Base URL

All API endpoints are relative to the base URL: `https://token-auth.000webhostapp.com`

### Auth Routes:

| Method |      Endpoint      | Description             |
| :----: | :----------------: | ----------------------- |
|  POST  | /api/auth/register | Register a new user     |
|  POST  |  /api/auth/login   | Login an existing User  |
|  POST  |  /api/auth/logout  | Logout an existing User |
|  POST  | /api/auth/refresh  | Refresh user's token    |

### Resource Routes:

| Method |     Endpoint      | Description                |
| :----: | :---------------: | -------------------------- |
|  GET   | /api/auth/profile | Get the authenticated user |

## Authentication

Authentication is required for most endpoints. You need to include an `Authorization` header with a valid API token.

### Request Headers

- `Authorization`: `Bearer YOUR_API_TOKEN`
- `Content-Type`: `application/json`

## Endpoints

### 1. Auth

### 1.1 Register New User

- **Endpoint**: `/api/auth/register`
- **Method**: POST
- **Description**: Register a new user
- **Request Body**:

```bash
{
    "name": "John Doe",
    "email": "john@gmail.com",
    "password": "john123",
    "password_confirmation": "john123"
}
```

- **Response**:

```json
{
  "message": "User successfully registered",
  "user": {
    "name": "John Doe",
    "email": "john@gmail.com",
    "updated_at": "2023-09-25T21:40:03.000000Z",
    "created_at": "2023-09-25T21:40:03.000000Z",
    "id": 1
  }
}
```
### 1.2 Login

- **Endpoint**: `/api/auth/login`
- **Method**: POST
- **Description**: log in an existing user
- **Request Body**:

```bash
{
    "email": "john@gmail.com",
    "password": "john123"
}
```

- **Response**:

```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3Rva2VuLWF1dGguMDAwd2ViaG9zdGFwcC5jb20vYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2OTU2NzgzNDEsImV4cCI6MTY5NTY4MTk0MSwibmJmIjoxNjk1Njc4MzQxLCJqdGkiOiIzVWl0bE56Q1dPUEdkalBNIiwic3ViIjoiNCIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.NrYClbj6HA_pGzyDxTbjoLd3xnym4nZCPZVv-hUHDb4",
    "token_type": "bearer",
    "expires_in": 3600,
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@gmail.com",
        "email_verified_at": null,
        "created_at": "2023-09-25T21:40:03.000000Z",
        "updated_at": "2023-09-25T21:40:03.000000Z"
    }
}
```

### 1.3 Logout

- **Endpoint**: `/api/auth/logout`
- **Method**: POST
- **Description**: logout an existing user

- **Response**:

```json
{
    "message": "User successfully signed out"
}
```

### 1.3 Refresh Token

- **Endpoint**: `/api/auth/refresh`
- **Method**: POST
- **Description**: Refresh user's token

- **Response**:

```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3Rva2VuLWF1dGguMDAwd2ViaG9zdGFwcC5jb20vYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2OTU2NzgzNDEsImV4cCI6MTY5NTY4MTk0MSwibmJmIjoxNjk1Njc4MzQxLCJqdGkiOiIzVWl0bE56Q1dPUEdkalBNIiwic3ViIjoiNCIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.NrYClbj6HA_pGzyDxTbjoLd3xnym4nZCPZVv-hUHDb4",
    "token_type": "bearer",
    "expires_in": 3600,
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@gmail.com",
        "email_verified_at": null,
        "created_at": "2023-09-25T21:40:03.000000Z",
        "updated_at": "2023-09-25T21:40:03.000000Z"
    }
}
```

### 2. Users

#### 2.1 Get User Information

- **Endpoint**: `/api/auth/profile`
- **Method**: GET
- **Description**: Retrieve currently logged in user information.
- **Response**:

```json
{
  "id": 1,
  "name": "John Doe",
  "email": "john@example.com",
  "created_at": "2023-01-15T12:30:45Z",
  "updated_at": "2023-01-15T12:30:45Z"
}
```
