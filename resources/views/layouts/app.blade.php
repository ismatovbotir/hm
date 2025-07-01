<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Приложение')</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-white border-r border-gray-200 shadow-sm">
    <div class="p-4 text-xl font-bold border-b border-gray-100">
      📦 Панель
    </div>
    <nav class="p-4 space-y-2 text-sm">
      <a href="/item" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">🏷 Товары</a>
      <a href="/partner" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">👥 Контрагенты</a>
      <a href="/report" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">📊 Отчёты</a>
    </nav>
  </aside>

  <!-- Main content -->
  <main class="flex-1 p-6">
    @yield('content')
  </main>

</body>
</html>
