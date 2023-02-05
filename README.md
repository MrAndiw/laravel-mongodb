# Mile Backend Developer Test

[![forthebadge](https://forthebadge.com/images/badges/built-with-love.svg)](https://forthebadge.com)
[![forthebadge](https://forthebadge.com/images/badges/built-by-developers.svg)](https://forthebadge.com)

Solution

    1. Pertama Membuat REST API Sesuai Test (untuk postman dokumen ada di file Mile.postman_collection.json)
            1. GET /package
            2. GET /package/{id}
            3. POST /package
            4. PUT /package/
            5. PATCH /package/
            6. DELETE /package/
    2. Menambahkan Validasi untuk API Create, Update, Patch
    3. Membuat Unit test : ./vendor/bin/phpunit tests/Feature/Http/Controllers/MileControllerTest.php
    4. PUT bekerja dengan cara menimpa replace resource dengan resource yang baru. sedangkan method PATCH digunakan untuk meng-update sebagian field yang diminta yang ada dari resource.

About

    Nama : Andi Wibowo
    Email : MrAndiiw@gmail.com
