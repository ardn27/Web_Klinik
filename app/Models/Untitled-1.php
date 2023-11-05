App\Models\User::create([
    "name" => "admin",
    "email" => "admin@gmail.com",
    "password" => bcrypt("123"),
])