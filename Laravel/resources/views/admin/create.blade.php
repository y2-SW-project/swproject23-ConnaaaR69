<x-layout-no-footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Create a New Product</h1>
                <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Product Title</span>
                        <input type="text" name="title" class="form-control" aria-label="Product Title"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Tags (Comma Separated)</span>
                        <input type="text" name="tags" class="form-control" aria-label="Tags"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">€</span>
                        <input type="text" name="price" class="form-control"
                            aria-label="Amount (to the nearest Euro)">
                        <span class="input-group-text">.00</span>
                    </div>
                    <div class="input-group mb-3">

                        <input class="form-control" name="image" value="{{ old('image') }}" type="file"
                            id="formFile">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Description</span>
                        <textarea type="text" name="text" class="form-control" aria-label="Description" aria-describedby="basic-addon1"></textarea>
                    </div>

                </form>
            </div>
        </div>
    </div>


</x-layout-no-footer>
