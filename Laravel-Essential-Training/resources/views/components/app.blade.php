<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laravel-Essential-Training</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <nav class="bg-gray-100 px-8 py-4 text-gray-700 flex items-center justify-center justify-between"> 
        <span class="font-bold text-2xl"> Laravel-Essential-Training </span>
        <span> Hello, {{ $name }} </span>
        </nav>
        
        <section class="p-12 mx-auto max-w-6xl text-gray-800">
            {{ $content }}
        </section>
    </body>
</html>
