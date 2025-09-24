# Laravel MDM API

## Description
Backend API to register, lock, and unlock Android devices.

## API Endpoints
- POST `/api/devices/register`
- POST `/api/devices/{device_id}/lock`
- POST `/api/devices/{device_id}/unlock` (protected with Sanctum)

## Run Locally
```
php artisan migrate
php artisan serve
```

