{{-- <div>
  <input wire:model="search" type="search" placeholder="Search...">

  <h1>Search Results:</h1>

  <ul>
    @foreach ($orders as $order)
      <li>{{ $order->full_name }}</li>
    @endforeach
  </ul>
</div> --}}

<ul class="navbar-nav float-left mr-auto">
  <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href=""><i class="ti-search"></i></a>
    <form class="app-search position-absolute" action="">
      @csrf
      <input type="text" class="form-control" placeholder="Search &amp; enter" wire:model="search"> <a
        class="srh-btn"><i class="ti-close"></i></a>
    </form>
  </li>
</ul>

<div class="container">
  @foreach ($orders as $order)
    {{ $order->price }}
  @endforeach
</div>
