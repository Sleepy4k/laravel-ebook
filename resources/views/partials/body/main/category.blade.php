<div class="row">
    <div class="col-12 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4>Kategori Buku ({{ $bookCategory->total() }})</h4>
            </div>
            <div class="card-body">
                @foreach ($bookCategory as $category)
                    <div class="row">
                        <div class="col-10">
                            <div class="d-flex align-items-center">
                                <svg class="bi text-primary" width="32" height="32" fill="blue"
                                    style="width:10px">
                                    <use
                                        xlink:href="assets/images/bootstrap-icons.svg#circle-fill" />
                                </svg>
                                <h5 class="mb-0 ms-3">{{ $category->name }}</h5>
                            </div>
                        </div>
                        <div class="col-2">
                            <h5 class="mb-0">{{ count($category->books) }}</h5>
                        </div>
                    </div>
                @endforeach
                <br>
                {{ $bookCategory->links() }}
            </div>
        </div>
    </div>
    @includeIf('partials.body.main.chart')
</div>