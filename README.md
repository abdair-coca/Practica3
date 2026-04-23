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

### 1. Listar todos los productos de una categoría específica

```php
$category = Category::where('name', 'Ropa')->first();
$category->products;
```

<p align="center">
  <img src="https://github.com/user-attachments/assets/6f8dfa68-6dd1-4a99-b545-dcc000fddab1" width="800">
</p>

---

### 2. Obtener todos los pedidos de un cliente con sus productos

```php
$customer = Customer::with('orders.products')->first();
$customer->orders;
```

<p align="center">
  <img src="https://github.com/user-attachments/assets/20ad213d-67fe-41a4-b02d-e836cb47b683" width="800">
</p>

---

### 3. Acceder al pago de un pedido específico

```php
$order = Order::find(3);
$order->payment;
```

<p align="center">
  <img src="https://github.com/user-attachments/assets/2fe03f27-c71c-4818-8ecb-ef4510d35dce" width="500">
</p>

---

### 4. Usar accessor personalizado (precio formateado)

```php
Product::find(4)->formatted_price;
```

<p align="center">
  <img src="https://github.com/user-attachments/assets/8fa97602-0d84-4d02-b423-b318f104266d" width="400">
</p>

---

### 5. Contar cuántos productos tiene cada categoría

```php
Category::withCount('products')->get();
```

<p align="center">
  <img src="https://github.com/user-attachments/assets/6d8f0a7f-2b63-42d3-9346-c8430cf57dc2" width="800">
</p>

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
