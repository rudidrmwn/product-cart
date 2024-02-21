<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tailwindcss 3 in Laravel 10 with Vite</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')

</head>

<body>
</h1></div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
            <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6 py-4">Produk</th>
                        <th scope="col" class="px-6 py-4">Pilihan Harga</th>
                        <th scope="col" class="px-6 py-4">Kuantitas</th>
                        <th scope="col" class="px-6 py-4">Subtotal</th>
                        <th scope="col" class="px-6 py-4">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">1</td>
                        <td class="whitespace-nowrap px-6 py-4">Mark</td>
                        <td class="whitespace-nowrap px-6 py-4">Otto</td>
                        <td class="whitespace-nowrap px-6 py-4">@mdo</td>
                        <th scope="col" class="px-6 py-4">Hapus</th>
                    </tr>
                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">2</td>
                        <td class="whitespace-nowrap px-6 py-4">Jacob</td>
                        <td class="whitespace-nowrap px-6 py-4">Thornton</td>
                        <td class="whitespace-nowrap px-6 py-4">@fat</td>
                        <th scope="col" class="px-6 py-4">Hapus</th>
                    </tr>
                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">3</td>
                        <td class="whitespace-nowrap px-6 py-4">Larry</td>
                        <td class="whitespace-nowrap px-6 py-4">Wild</td>
                        <td class="whitespace-nowrap px-6 py-4">@twitter</td>
                        <th scope="col" class="px-6 py-4">Hapus</th>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</body>
</html>