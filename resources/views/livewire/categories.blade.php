<div>

  <div class="row ml-5 mt-5">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center text-uppercase">Categories</h4>
          <div class="feed-widget">
            <div class="col-md-4">
              <a href="{{ route('category.add') }}" class="btn btn-primary">Add new category</a>
            </div>

            <div class="categories mt-5">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Date added</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $cat)
                    <tr>
                      <td scope="row"></td>
                      <td class="">{{ $cat->category_code }}</td>
                      <td class="">{{ $cat->category_name }}</td>
                      <td class="">{{ $cat->created_at }}</td>
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
