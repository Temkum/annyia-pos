  <div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
      <div class="row align-items-center">
        <div class="col-5">
          <h4 class="page-title">Dashboard</h4>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
              </ol>
            </nav>
          </div>
        </div>
        {{-- <div class="col-7">
          <div class="text-right upgrade-btn">
            <a href="" class="btn btn-danger text-white" target="_blank">Due Orders</a>
          </div>
        </div> --}}
      </div>

      {{-- <label for="search">Search item</label> --}}
      <div class="row">
        <div class="col-12 mt-3 text-center">
          <div>
            <input type="text" wire:model="term" placeholder="Search item" class="search-boxx">
          </div>
        </div>
      </div>

    </div>
    <!-- Container fluid  -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4>Recent Transactions</h4>
              <div class="right-column">
                {{-- <div class="badge badge-primary">Latest 5</div> --}}
              </div>
            </div>
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active show" href="#sale-latest" role="tab" data-toggle="tab"
                  aria-selected="false">Order Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#purchase-latest" role="tab" data-toggle="tab"
                  aria-selected="true">Pending</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#quotation-latest" role="tab" data-toggle="tab"
                  aria-selected="false">Due</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#payment-latest" role="tab" data-toggle="tab"
                  aria-selected="false">Completed</a>
              </li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade active show" id="sale-latest">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="bg-gray text-white">
                      <tr>
                        <th>Date Added</th>
                        <th>Advance Paid</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Grand Total</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        <tr>
                          <td>{{ date('j F, Y', strtotime($order->created_at)) }}</td>
                          <td>{{ $order->advance_paid }}Fcfa</td>
                          <td>{{ $order->full_name }}</td>
                          <td>
                            @if ($order->status == 'Due' || $order->status == 'Cancelled')
                              <div class="badge badge-danger text-white">{{ $order->status }}</div>
                            @elseif ($order->status == 'Delivered')
                              <div class="badge badge-success text-white">{{ $order->status }}</div>
                            @elseif($order->status == 'Pending')
                              <div class="badge badge-warning text-white">{{ $order->status }}</div>
                            @else
                              <div class="badge badge-secondary text-white">{{ $order->status }}</div>
                            @endif

                          </td>
                          <td class="font-weight-bold">{{ $order->price }}Fcfa</td>
                          <td>
                            <a class="btn btn-sm btn-outline-secondary" href="" onclick="printReceiptContent('print')"
                              data-toggle="modal" data-target="#printReceipt">Print</a>
                          </td>
                        </tr>

                      @endforeach
                    </tbody>
                  </table>
                  {{-- <div class="paginate-row">
                    {{ $orders->links() }}
                  </div> --}}

                </div>
              </div>

              <!-- pending / purchase tab -->
              <div role="tabpanel" class="tab-pane fade " id="purchase-latest">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Date Added</th>
                        <th>Customer</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Advance payment</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        @if ($order->status == 'Pending')
                          <tr>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td>{{ $order->full_name }}</td>
                            <td>{{ $order->description }}</td>
                            <td>
                              <div class="badge btn-warning p-2">{{ $order->status }}</div>
                            </td>
                            <td class="font-weight-bold">{{ $order->advance_paid }}Fcfa</td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

              {{-- due tap --}}
              <div role="tabpanel" class="tab-pane fade" id="quotation-latest">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Advance Paid</th>
                        <th>Customer</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Grand Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        @if ($order->status == 'Due')
                          <tr>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td>{{ $order->advance_paid }}Fcfa</td>
                            <td>{{ $order->full_name }}</td>
                            <td>
                              <div class="badge badge-danger">{{ $order->status }}</div>
                            </td>
                            <td class="font-weight-bold">{{ $order->price }}Fcfa</td>
                          </tr>
                        @endif

                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

              {{-- delivered tab --}}
              <div role="tabpanel" class="tab-pane fade" id="payment-latest">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Done At</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        @if ($order->status == 'Delivered')
                          <tr>
                            <td>{{ $order->updated_at->diffForHumans() }}</td>
                            <td>{{ $order->full_name }}</td>
                            <td class="badge badge-success">{{ $order->status }}</td>
                            <td class="font-weight-bold">{{ $order->price }}Fcfa</td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Feeds</h4>
              <div class="feed-widget">
                <ul class="list-style-none feed-body m-0 p-b-20">
                  <li class="feed-item">
                    <div class="feed-icon bg-info"><i class="far fa-bell"></i></div> You have 4 pending tasks.
                    <span class="ml-auto font-12 text-muted">Just Now</span>
                  </li>
                  <li class="feed-item">
                    <div class="feed-icon bg-success"><i class="ti-server"></i></div> Server #1
                    overloaded.<span class="ml-auto font-12 text-muted">2 Hours ago</span>
                  </li>
                  <li class="feed-item">
                    <div class="feed-icon bg-warning"><i class="ti-shopping-cart"></i></div> New order
                    received.<span class="ml-auto font-12 text-muted">31 May</span>
                  </li>
                  <li class="feed-item">
                    <div class="feed-icon bg-danger"><i class="ti-user"></i></div> New user registered.<span
                      class="ml-auto font-12 text-muted">30 May</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div> --}}
      </div>

      {{-- PRINT RECEIPT --}}
      <!-- Modal -->
      <div class="modal fade" id="printReceipt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Print Receipt</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid" id="print">
                @include('livewire.receipt')
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>

      {{-- sale chart --}}
      <div class="row">
        <!-- column -->
        {{-- <div class="col-12">
          <div class="card">
            <div class="card-body">
              <!-- title -->
              <div class="d-md-flex align-items-center">
                <div>
                  <h4 class="card-title">Top Selling Products</h4>
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
            <div class="table-responsive">
              <table class="table v-middle">
                <thead>
                  <tr class="bg-light">
                    <th class="border-top-0">Products</th>
                    <th class="border-top-0">License</th>
                    <th class="border-top-0">Support Agent</th>
                    <th class="border-top-0">Technology</th>
                    <th class="border-top-0">Tickets</th>
                    <th class="border-top-0">Sales</th>
                    <th class="border-top-0">Earnings</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><a class="btn btn-circle btn-info text-white">EA</a></div>
                        <div class="">
                          <h4 class="m-b-0 font-16">Elite Admin</h4>
                        </div>
                      </div>
                    </td>
                    <td>Single Use</td>
                    <td>John Doe</td>
                    <td>
                      <label class="label label-danger">Angular</label>
                    </td>
                    <td>46</td>
                    <td>356</td>
                    <td>
                      <h5 class="m-b-0">$2850.06</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><a class="btn btn-circle btn-orange text-white">MA</a></div>
                        <div class="">
                          <h4 class="m-b-0 font-16">Monster Admin</h4>
                        </div>
                      </div>
                    </td>
                    <td>Single Use</td>
                    <td>Venessa Fern</td>
                    <td>
                      <label class="label label-info">Vue Js</label>
                    </td>
                    <td>46</td>
                    <td>356</td>
                    <td>
                      <h5 class="m-b-0">$2850.06</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><a class="btn btn-circle btn-success text-white">MP</a></div>
                        <div class="">
                          <h4 class="m-b-0 font-16">Material Pro Admin</h4>
                        </div>
                      </div>
                    </td>
                    <td>Single Use</td>
                    <td>John Doe</td>
                    <td>
                      <label class="label label-success">Bootstrap</label>
                    </td>
                    <td>46</td>
                    <td>356</td>
                    <td>
                      <h5 class="m-b-0">$2850.06</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><a class="btn btn-circle btn-purple text-white">AA</a></div>
                        <div class="">
                          <h4 class="m-b-0 font-16">Ample Admin</h4>
                        </div>
                      </div>
                    </td>
                    <td>Single Use</td>
                    <td>John Doe</td>
                    <td>
                      <label class="label label-purple">React</label>
                    </td>
                    <td>46</td>
                    <td>356</td>
                    <td>
                      <h5 class="m-b-0">$2850.06</h5>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div> --}}
      </div>

      <div class="row">
        <!-- column -->
        {{-- <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Recent Comments</h4>
            </div>
            <div class="comment-widgets scrollable">
              <!-- Comment Row -->
              <div class="d-flex flex-row comment-row m-t-0">
                <div class="p-2"><img src="../../assets/images/users/1.jpg" alt="user" width="50"
                    class="rounded-circle"></div>
                <div class="comment-text w-100">
                  <h6 class="font-medium">James Anderson</h6>
                  <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting
                    industry. </span>
                  <div class="comment-footer">
                    <span class="text-muted float-right">April 14, 2016</span> <span
                      class="label label-rounded label-primary">Pending</span> <span class="action-icons">
                      <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                      <a href="javascript:void(0)"><i class="ti-check"></i></a>
                      <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                    </span>
                  </div>
                </div>
              </div>
              <!-- Comment Row -->
              <div class="d-flex flex-row comment-row">
                <div class="p-2"><img src="../../assets/images/users/4.jpg" alt="user" width="50"
                    class="rounded-circle"></div>
                <div class="comment-text active w-100">
                  <h6 class="font-medium">Michael Jorden</h6>
                  <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting
                    industry. </span>
                  <div class="comment-footer ">
                    <span class="text-muted float-right">April 14, 2016</span>
                    <span class="label label-success label-rounded">Approved</span>
                    <span class="action-icons active">
                      <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                      <a href="javascript:void(0)"><i class="icon-close"></i></a>
                      <a href="javascript:void(0)"><i class="ti-heart text-danger"></i></a>
                    </span>
                  </div>
                </div>
              </div>
              <!-- Comment Row -->
              <div class="d-flex flex-row comment-row">
                <div class="p-2"><img src="../../assets/images/users/5.jpg" alt="user" width="50"
                    class="rounded-circle"></div>
                <div class="comment-text w-100">
                  <h6 class="font-medium">Johnathan Doeting</h6>
                  <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting
                    industry. </span>
                  <div class="comment-footer">
                    <span class="text-muted float-right">April 14, 2016</span>
                    <span class="label label-rounded label-danger">Rejected</span>
                    <span class="action-icons">
                      <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                      <a href="javascript:void(0)"><i class="ti-check"></i></a>
                      <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

        <!-- column -->
        {{-- <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Temp Guide</h4>
              <div class="d-flex align-items-center flex-row m-t-30">
                <div class="display-5 text-info"><i class="wi wi-day-showers"></i> <span>73<sup>°</sup></span></div>
                <div class="m-l-10">
                  <h3 class="m-b-0">Saturday</h3><small>Ahmedabad, India</small>
                </div>
              </div>
              <table class="table no-border mini-table m-t-20">
                <tbody>
                  <tr>
                    <td class="text-muted">Wind</td>
                    <td class="font-medium">ESE 17 mph</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Humidity</td>
                    <td class="font-medium">83%</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Pressure</td>
                    <td class="font-medium">28.56 in</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Cloud Cover</td>
                    <td class="font-medium">78%</td>
                  </tr>
                </tbody>
              </table>
              <ul class="row list-style-none text-center m-t-30">
                <li class="col-3">
                  <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                  <span class="d-block text-muted">09:30</span>
                  <h3 class="m-t-5">70<sup>°</sup></h3>
                </li>
                <li class="col-3">
                  <h4 class="text-info"><i class="wi wi-day-cloudy"></i></h4>
                  <span class="d-block text-muted">11:30</span>
                  <h3 class="m-t-5">72<sup>°</sup></h3>
                </li>
                <li class="col-3">
                  <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                  <span class="d-block text-muted">13:30</span>
                  <h3 class="m-t-5">75<sup>°</sup></h3>
                </li>
                <li class="col-3">
                  <h4 class="text-info"><i class="wi wi-day-sprinkle"></i></h4>
                  <span class="d-block text-muted">15:30</span>
                  <h3 class="m-t-5">76<sup>°</sup></h3>
                </li>
              </ul>
            </div>
          </div>
        </div> --}}
      </div>
      <div class="paginate-row">
        {{ $orders->links() }}
      </div>

    </div>

    <script>
      $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

      });

      function printReceiptContent(el) {
        let data =
          `<input type="button" class="" id="printBtn" style="width: 70vw; padding: .5rem; cursor: pointer; backgroud-color: #008b8b; border-radius: 10px; display: block;" onclick="window.print()" value="PRINT ORDER">`;

        data += document.getElementById(el).innerHTML;

        orderReceipt = window.open('', 'printWindow', "left=150, top=130, width=600, height=700");
        orderReceipt.screenX = 0;
        orderReceipt.screenY = 0;
        orderReceipt.document.write(data);
        orderReceipt.document.title = 'Print Order Receipt';

        orderReceipt.focus();
        setTimeout(() => {
          orderReceipt.close()
        }, 10000);

      };
    </script>
