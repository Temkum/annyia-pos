<div>
  <style>
    .paginate-row {
      margin: auto;
      width: 50%;
    }

    .paginate-row div {
      margin: auto;
      width: 50%;
    }

  </style>

  <div class="row">
    <!-- column -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- title -->
          <div class="d-md-flex align-items-center">
            <div>
              <h4 class="card-title">Clients' orders</h4>
              <h5 class="card-subtitle">Overview of Top Selling Items</h5>
            </div>
            <div class="ml-auto">

              <div class="dl">
                <select class="custom-select">
                  <option value="0" selected>Monthly</option>
                  <option value="1">Daily</option>
                  <option value="2">Weekly</option>
                  <option value="3">Yearly</option>
                </select>
              </div>
            </div>
          </div>
          <!-- title -->
        </div>
        <div class="mt-2 w-50 m-auto">
          @if (Session::has('message'))
            <div class="alert alert-success text-center" role="alert">{{ Session::get('message') }}</div>
          @endif
        </div>
        <div class="table-responsive">
          <table class="table v-middle table-sm ">
            <thead class="bg-secondary text-white">
              <tr class="">
                <th class="border-top-0">SN</th>
                <th class="border-top-0">Code</th>
                <th class="border-top-0">Advance Paid</th>
                <th class="border-top-0">Qty</th>
                <th class="border-top-0">Due Date</th>
                <th class="border-top-0">Balance</th>
                <th class="border-top-0">Order Details</th>
                <th class="border-top-0">Total</th>
                <th class="border-top-0">Client Name</th>
                <th class="border-top-0">Phone</th>
                <th class="border-top-0">Address</th>
                <th class="border-top-0"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
                <tr>
                  <td class=""></td>
                  <td class="">{{ $order->order_code }}</td>
                  <td class="">{{ $order->advance_paid }}Fcfa</td>
                  <td class="">{{ $order->quantity }}</td>
                  <td class="badge badge-success">{{ $order->due_date }}</td>
                  <td class="">{{ $order->balance }}Fcfa</td>
                  <td class="">{{ $order->description }}</td>
                  <td class="">{{ $order->price }}Fcfa</td>
                  <td class="">{{ $order->full_name }}</td>
                  <td class="">{{ $order->mobile }}</td>
                  <td class="">{{ $order->address }}</td>
                  <td class="d-flex text-align-center">
                    <div class="action m-2">
                      <a href="{{ route('order.edit', ['order_id' => $order->id]) }}"
                        class="btn btn-sm btn-outline-primary m-1">Modify</a>
                      <a href="" class="btn btn-sm btn-outline-danger m-1"
                        onclick="confirm('Are you sure you want to delete this order?') || event.stopImmediatePropagation()"
                        wire:click.prevent="deleteOrder({{ $order->id }})">Delete</a>
                      <a href="" class="btn btn-sm btn-secondary">Print</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="paginate-row">
          {{-- pagination --}}
          {{ $orders->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
