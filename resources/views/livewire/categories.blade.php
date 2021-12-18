<div class="page-wrapper">

  <div class="row ml-5 mt-5">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center text-uppercase">Categories</h4>
          <div class="feed-widget">
            <div class="col-md-4">
              <a href="{{ route('category.add') }}" class="btn btn-primary">Add new category</a>
            </div>

            <div class="row">
              <div class="col-12 mt-3 text-center">
                {{-- <label for="search">Search item</label> --}}
                <div>
                  <input type="text" wire:model="term" placeholder="Search name">
                </div>
              </div>
            </div>
            {{ $term }}
            <div class="categories mt-5">
              <table class="table table-sm">
                <thead class="bg-secondary text-white">
                  <tr>
                    <th></th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Date added</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $cat)
                    <tr>
                      <td scope=""></td>
                      <td class="">{{ $cat->category_code }}</td>
                      <td class="">{{ $cat->category_name }}</td>
                      {{-- <td class="">{{ date('m-d-Y', strtotime($cat->created_at)) }}</td> --}}
                      <td class="">{{ date_format($cat->created_at, 'g:ia \o\n l jS F Y') }}</td>
                      <td>
                        <a class="btn btn-sm btn-primary mr-3"
                          href="{{ route('category.edit', ['category_id' => $cat->id]) }}">Edit</a>
                        <a href="" class="btn btn-sm btn-danger"
                          onclick="confirm('Are you sure you want to delete this category?') || event.stopImmediatePropagation()"
                          wire:click.prevent="deleteCategory({{ $cat->id }})">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
