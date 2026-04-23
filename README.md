# 🛒 Sistema de Ventas - Laravel

## 📌 Descripción

Este proyecto es una práctica de desarrollo backend utilizando **Laravel**, donde se implementa un sistema de ventas completo.

El sistema permite gestionar productos, categorías, clientes, pedidos y pagos, aplicando conceptos clave como:

* Relaciones Eloquent
* Factories y Seeders
* Accessors personalizados
* Consultas con Tinker

---

## 🚀 Tecnologías utilizadas

* PHP
* Laravel
* PostgreSQL
* Eloquent ORM

---

## 🗂️ Modelos principales

* **Category**: Categorías de productos
* **Product**: Productos disponibles en la tienda
* **Customer**: Clientes registrados
* **Order**: Pedidos realizados
* **OrderItem**: Detalle de pedidos (tabla pivote)
* **Payment**: Pagos asociados a pedidos

---

## 🔗 Relaciones

* Una **Category** tiene muchos **Products**
* Un **Product** pertenece a una **Category**
* Un **Order** pertenece a un **Customer**
* Un **Order** tiene muchos **Products** (relación many-to-many mediante **OrderItem**)
* Un **Order** tiene un **Payment**

---

## ⚙️ Funcionalidades implementadas

* Creación de migraciones
* Uso de factories y seeders
* Generación automática de SKU
* Accessors personalizados (ej: precio formateado)
* Relaciones entre modelos
* Consultas con Tinker

---

## 🧪 Consultas realizadas en Tinker

```php
// 1. Listar todos los productos de una categoría específica
$category = Category::where('name', 'Ropa')->first();
$category->products;
<img width="1862" height="922" alt="image" src="https://github.com/user-attachments/assets/6f8dfa68-6dd1-4a99-b545-dcc000fddab1" />

// 2. Obtener todos los pedidos de un cliente con sus productos
$customer = Customer::with('orders.products')->first();
$customer->orders;
<img width="1388" height="894" alt="image" src="https://github.com/user-attachments/assets/20ad213d-67fe-41a4-b02d-e836cb47b683" />

// 3. Acceder al pago de un pedido específico
$order = Order::find(3);
$order->payment;
<img width="660" height="232" alt="image" src="https://github.com/user-attachments/assets/2fe03f27-c71c-4818-8ecb-ef4510d35dce" />

// 4. Usar accessor personalizado (precio formateado)
Product::find(4)->formatted_price;
<img width="435" height="90" alt="image" src="https://github.com/user-attachments/assets/8fa97602-0d84-4d02-b423-b318f104266d" />

// 5. Contar cuántos productos tiene cada categoría
Category::withCount('products')->get();
<img width="891" height="748" alt="image" src="https://github.com/user-attachments/assets/6d8f0a7f-2b63-42d3-9346-c8430cf57dc2" />

```
```

## 🛠️ Instalación y uso

1. Clonar el repositorio:

```bash
git clone <url-del-repositorio>
```

2. Instalar dependencias:

```bash
composer install
```

3. Configurar el archivo `.env` con tu base de datos

4. Ejecutar migraciones y seeders:

```bash
php artisan migrate:fresh --seed
```

5. Ejecutar Tinker:

```bash
php artisan tinker
```

---

## 🎯 Objetivo del proyecto

El objetivo de esta práctica es reforzar el manejo de:

* Eloquent ORM
* Relaciones entre tablas
* Manipulación de datos
* Consultas en tiempo real

---

## 📚 Autor

Desarrollado como práctica de backend en Laravel.
