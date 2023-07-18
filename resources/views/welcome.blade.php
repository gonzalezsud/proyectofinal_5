<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/cbc23decbe.js" crossorigin="anonymous"></script>
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>
<body class="antialiased">
    <div class="flex">
        <div class="w-1/13 bg-gray-100">
            <nav class="h-screen flex flex-col justify-between items-center py-6">
                <div>
                    <img src="{{ asset("imgs/logo.svg") }}" alt="">
                </div>
                <div class="flex flex-col gap-6 text-xl">
                    <button class="btn-option w-24"><i class="fa-solid fa-list"></i></button>
                    <button class="btn-option w-24"><i class="fa-solid fa-arrow-rotate-left"></i></button>
                    <button class="btn-option w-24"><i class="fa-solid fa-chart-simple"></i></button>
                </div>
                <div class="text-2xl">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </nav>
        </div>
        <div class="w-3/4 bg-gray-200">
            <div class="my-6 mx-4 grid grid-cols-2 gap-4">
                <div>
                    <p class="text-lg">Shoppingify allows you to take your Shopping list wherever you go</p>
                </div>
                <div class="flex">
                    <form class="flex items-center">
                        <span class="material-icons text-gray-500">search</span>
                        <input class="pl-2 border border-gray-300 rounded-md" type="text" placeholder="Search item" />
                    </form>
                </div>
            </div>
            <table>
                <div class="my-6 mx-4">
                    @foreach ($categories as $category)
                        <div class="mb-8">
                            <p class="text-lg font-bold mb-2">{{ $category->name }}</p>
                            <div class="grid grid-cols-5 gap-6">
                                @foreach ($category->items as $item)
                                    <div class="bg-gray-200 border border-gray-400 rounded-lg p-4 flex items-center justify-center cursor-pointer"
                                         data-item-id="{{ $item->id }}"
                                         onclick="showItemDetails(this)">
                                        <span class="text-gray-600 mx-2">{{ $item->name }}</span>
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </table>
        </div>
        <div class="w-1/7 bg-gray-300 flex-grow">
            <div class="my-6 mx-4" id="item-details">
                <div class="bg-gray-200 border border-gray-400 rounded-lg p-4 flex items-center justify-center cursor-pointer"
                data-item-id="{{ $item->id }}"
                onclick="loadCreateItemForm('{{ route('items.create') }}')">
               <span class="text-gray-600 mx-2">{{ $item->name }}</span>
               <i class="fa-solid fa-plus"></i>
           </div> <!-- Aquí se mostrará el contenido de la vista create.blade.php al hacer clic en un item -->
            </div>
        </div>
    <script>
        const botones = document.querySelectorAll(".btn-option");
        console.log(botones);
        botones.forEach((btn) => {
            btn.addEventListener("click", () => {
                btn.classList.toggle("active");
            });
        });

        const selectedItemsContainer = document.getElementById('selected-items');
        const itemDetailsContainer = document.getElementById('item-details');
        const backButton = document.querySelector('.p-4 button.text-gray-600');

        async function showItemDetails(itemElement) {
            const itemId = itemElement.getAttribute('data-item-id');
            const itemDetails = await getItemDetails(itemId);

            itemDetailsContainer.innerHTML = `
                <div class="p-4">
                    <button class="text-gray-600" onclick="hideItemDetails()"><i class="fa-solid fa-arrow-left"></i> Back</button>
                    <img src="{{ asset('storage/') }}/${itemDetails.image}" alt="${itemDetails.name}" class="w-16 h-16">
                    <p class="text-gray-600">${itemDetails.category_name}</p>
                    <p>${itemDetails.note}</p>
                </div>
            `;
        }

        function hideItemDetails() {
            itemDetailsContainer.innerHTML = '';
        }

        async function getItemDetails(itemId) {
            const response = await fetch(`/items/${itemId}`);
            const item = await response.json();
            return item;
        }

        function loadCreateItemForm(url) {
        // Realiza una petición AJAX para obtener el contenido de la vista create.blade.php
        fetch(url)
            .then(response => response.text())
            .then(html => {
                const itemDetailsContainer = document.getElementById('item-details');
                itemDetailsContainer.innerHTML = html;
            })
            .catch(error => {
                console.error('Error al cargar el formulario de creación de item:', error);
            });
    }
    </script>
</body>
</html>
