{{-- <div>
  <form action="{{ route('category.add') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" id="category_code" placeholder="Enter code" wire:model="category_code">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Enter name/description" name=""
          wire:model="category_name">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div> --}}

<div>
  <div class="container" style="padding: 40px 0">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('categories') }}" class="btn btn-primary">All Categories</a>
              </div>
              <div class="col-md-6">
                ADD NEW CATEGORY
              </div>
            </div>
          </div>

          {{-- panel body --}}
          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form class="form-horizontal" method="" wire:submit.prevent="store">
              @csrf
              <div class="form-group">
                <label for="" class="col-md-4 control-label">Category Code</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Category Name" class="form-control input-md"
                    wire:model="category_code">
                  @error('category_code')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Category Name</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Category Name" class="form-control input-md"
                    wire:model="category_name">
                  @error('category_name')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label"></label>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>{{-- panel body end --}}

        </div>
      </div>
    </div>
  </div>
</div>
