<div class="page-wrapper">
  <style>
    nav svg {
      max-height: 20px;
    }

    .badge,
    .btn-sm {
      border-radius: 5px;
    }

  </style>

  <!-- Bread crumb and right sidebar toggle -->
  <div class="page-breadcrumb">
    <div class="row align-items-center">
      <div class="col-5">
        <h4 class="page-title">Orders</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="col-7">
        <div class="text-right upgrade-btn">
          <a href="#" class="btn btn-danger text-white">Pending orders</a>
        </div>
      </div>
    </div>
    {{-- search bar --}}
    <div class="row">
      <div class="col-12 mt-3 text-center">
        <div>
          <input type="text" wire:model="term" placeholder="Search item" class="search-boxx">
        </div>
      </div>
    </div>
  </div>


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
                <select class="custom-select" wire:model="sorting">
                  <option value="default" selected>Months</option>
                  <option value="due_date">Due orders</option>
                  <option value="name">Name</option>
                  <option value="pending">Pending</option>
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
                <th class="">SN</th>
                <th class="">Code</th>
                <th class="">Advance Paid</th>
                <th class="">Qty</th>
                <th class="">Date Added</th>
                <th class="">Balance</th>
                <th class="">Status</th>
                {{-- <th class="">Order Details</th> --}}
                <th class="">Total</th>
                <th class="">Client Name</th>
                <th class="">Phone</th>
                <th class="">Address</th>
                <th class=""></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
                <tr>
                  <td class=""></td>
                  <td class="">{{ $order->order_code }}</td>
                  <td class="">{{ $order->advance_paid }}Fcfa</td>
                  <td class="">{{ $order->quantity }}</td>
                  <td class="">{{ $order->created_at->diffForHumans() }}</td>
                  <td class="">{{ $order->balance }}Fcfa</td>
                  <td class="">
                    @if ($order->status == 'Due' || $order->status == 'Cancelled')
                      <div class="badge badge-danger text-white">{{ $order->status }}</div>
                    @elseif ($order->status == 'Delivered')
                      <div class="badge badge-success text-white">{{ $order->status }}</div>
                    @elseif($order->status == 'Ordered')
                      <div class="badge badge-secondary text-white">{{ $order->status }}</div>
                    @else
                      <div class="badge badge-warning text-white">{{ $order->status }}</div>
                    @endif
                  </td>
                  {{-- <td class="">{{ $order->description }}</td> --}}
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
