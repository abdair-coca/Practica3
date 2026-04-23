<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Creamos 10 consumidores
        Customer::factory(10)->create();

        //ejecutar CategorySeeder
        $this->call(CategorySeeder::class);
        $categoryIds = Category::pluck('id');

        //Creamos 75 productos asignando la foreign id
        $products = Product::factory(75)->create([
            'category_id' => fn() => $categoryIds->random(),
        ]);

        //creamos 15 ordenes 
        $customerId = Customer::pluck('id');
        $orders = Order::factory(15)->create([
            'customer_id' => fn() => $customerId->random(),
        ]);

        foreach ($orders as $order) {

            $productsSelected = $products->random(rand(1, 5));
            $total = 0;

            foreach ($productsSelected as $product) {

                $quantity = rand(1, 3);

                // Crear OrderItem
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $product->price,
                ]);

                // Acumular total
                $total += $product->price * $quantity;
            }

            // Actualizar total del pedido
            $order->update([
                'total' => $total
            ]);

            // Crear Payment usando factory
            $payment = Payment::factory()->create([
                'order_id' => $order->id,
                'amount' => $total,
            ]);

            // Si está completado asignar fecha
            if ($payment->status === 'completed') {
                $payment->update([
                    'paid_at' => fake()->dateTimeBetween('-1 year', 'now'),
                ]);
            }
        }
    }
}
