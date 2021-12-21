<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceController extends Controller
{
    public function show()
    {
        $customer = new Buyer([
            'name'          => 'John Doe',
            'custom_fields' => [
                'email' => 'test@example.com',
            ],
        ]);

        $item = (new InvoiceItem())->title('Suit')->pricePerUnit(4);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->dateFormat('m/d/Y')
            ->discountByPercent(10)
            ->taxRate(25)
            ->shipping(299)
            ->addItem($item);

        return $invoice->stream();
    }
}