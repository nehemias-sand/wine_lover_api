#!/bin/bash

echo "🚀 Ejecutando startup script..."

if [ ! -L "/var/www/html/public/storage" ]; then
    echo "🔗 Ejecutando: php artisan storage:link"
    php artisan storage:link || echo "⚠️ storage:link falló (quizás ya existe)"
else
    echo "✅ Symlink public/storage ya existe"
fi

echo "📦 Cacheando configuración de Laravel..."
php artisan config:clear && php artisan config:cache

echo "🗺  Cacheando rutas..."
php artisan route:cache

echo "🖼  Cacheando vistas..."
php artisan view:cache

exec apache2-foreground
