<div class="page-wrapper">
  <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
      <div class="row align-items-center">
        <div class="col-5">
          <h4 class="page-title">Orders</h4>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Order</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="col-7">
          <div class="text-right upgrade-btn">
            <a href="" class="btn btn-danger text-white" target="_blank">Pending orders</a>
          </div>
        </div>
      </div>
    </div>

  <div class="content-wrapper"> 
    <h3 class="page-heading mb-4 text-center">Add Order</h3>
    @if (Session::has('message'))
      <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif
    <section class="forms">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                <form method="POST" action="" class="payment-form" wire:submit.prevent="store">
                  @csrf

                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="  col-md-2">
                          <div class="form-group">
                            <label>Categories</label>
                            <select class="selectpicker form-control" data-live-search="true"
                              data-live-search-style="begins" title="View Category">
                              @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" disabled> {{ $cat->category_code }} -
                                  {{ $cat->category_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="  col-md-2">
                          <div class="form-group">
                            <label>Order Code *</label>
                            <select required name="" id="product_id" class="selectpicker form-control"
                              data-live-search="true" data-live-search-style="begins" title="Select category code..."
                              wire:model="order_code">
                              @foreach ($categories as $cat)
                                <option value="{{ $cat->category_code }}"> {{ $cat->category_code }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>
                              Quantity *
                            </label>
                            <input type="number" name="" id="quantity" class="form-control" wire:model="quantity" />
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>
                              Price *
                            </label>
                            <input type="number" name="" id="order_cost" class="form-control price_amt"
                              wire:model="price" />
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>
                              Advance Paid *
                            </label>
                            <input type="number" name="" id="advance" class="form-control advance_amt"
                              wire:model="advance" />
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>
                              Due Date *
                            </label>
                            <input type="date" name="" id="due_date" class="form-control" wire:model="due_date" />
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>
                              Balance Payment *
                            </label>
                            <input type="number" name="" id="balance" class="form-control balance_amt" value=""
                              wire:model="balance" />
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>
                              Client's Name *
                            </label>
                            <input type="text" name="client_name" id="name" class="form-control" wire:model="name" />
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>
                              Mobile Number *
                            </label>
                            <input type="text" name="" id="mobile" class="form-control" wire:model="mobile" />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>
                              Address
                            </label>
                            <input type="text" name="" id="address" class="form-control" wire:model="address" />
                          </div>
                        </div>

                        <div class="col-md-5">
                          <label>Payment Note *</label>
                          <textarea rows="3" class="form-control" id="payment_note"
                            wire:model="payment_note"></textarea>
                        </div>

                        <div class="col-md-3">
                          <label> Order Status </label>
                          <select name="" id="" class="form-control" wire:model="order_status">
                            <option value="Pending">Pending</option>
                            <option value="Due">Due</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                          </select>
                          @error('payment_method')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>

                        <div class="col-md-3">
                          <label> Payment method </label>
                          <select name="" id="" class="form-control" wire:model="payment_method">
                            <option value="cash">Cash</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="momo">Mobile Money</option>
                          </select>
                          @error('payment_method')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>

                      <div class="col-md-8 form-group mt-4 text-center ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>

                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
