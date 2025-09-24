Laravel Backend for Mobile Device Management (MDM)

 Overview

This project is a Laravel-powered backend system for managing Android devices’ lock and unlock states.
It provides REST APIs to register devices, lock devices with reasons, and securely unlock devices using Laravel Sanctum authentication.

 This repo focuses on the backend — there’s no mobile frontend yet. All functionality is exposed as REST APIs and tested via Postman.

 Features

 Device registration (track devices by ID, user, and location)

 Lock a device with a reason (e.g., “Lost phone”)

 Unlock a device securely with Sanctum-authenticated requests

 SQLite database for quick local testing and prototyping

 Postman collection included for ready-to-use API testing

🛠 Setup & Testing
1. Install dependencies
composer install

2. Prepare database
touch database/database.sqlite
php artisan migrate

3. Run the server
php artisan serve

4. Test with Postman

Import the provided collection:
Postman_Collection_Updated.json

 API Examples
Register a Device
curl -X POST http://127.0.0.1:8000/api/devices/register \
-H "Content-Type: application/json" \
-d '{"device_id":"12345","user_name":"Alice","location":"Delhi"}'


Response:

{
  "id": 1,
  "device_id": "12345",
  "user_name": "Alice",
  "location": "Delhi",
  "status": "unlocked"
}

Lock a Device
curl -X POST http://127.0.0.1:8000/api/devices/12345/lockDevice \
-H "Content-Type: application/json" \
-d '{"reason":"Lost phone"}'

Unlock a Device
curl -X POST http://127.0.0.1:8000/api/devices/12345/unlockDevice \
-H "Authorization: Bearer YOUR_TOKEN" \
-H "Content-Type: application/json"

End Note: - 

This project started as a backend exploration in Laravel + PHP, but I extended it into a basic Mobile Device Management system.

While it’s currently API-only, the design makes it easy to plug into a frontend or expand into a full MDM product.
