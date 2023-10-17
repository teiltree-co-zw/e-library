@extends('layouts.app')

@section('content')

<div class="card p-2">
    <a href="{{ route('books.index') }}" class="btn rounded btn-success">Go Back to Books & Files</a>

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-success">Add New Book</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Grade <span class="text-danger">*</span></label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                            <select class="form-control" name="grade_id" id="grade_id" required>
                                <option selected>Select Grade</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('grade_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <img id="preview" src="#" alt="Image Preview" style="display: none; max-width: 20%;">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="product_img">Thumbnail <small>(optional)</small></label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bxs-file-image"></i
                                ></span>
                            <input
                                required
                                type="file"
                                class="form-control"
                                id="thumbnail"
                                name="thumbnail"
                                accept="image/*"
                            />
                        </div>
                        @error('thumbnail')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Book Name <span class="text-danger">*</span></label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="Example: Sunrise Readers"
                                name="name"
                                required
                            />
                        </div>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Upload Book <span class="text-danger">*</span></label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="mdi mdi-account-multiple menu-icon"></i
                            ></span>
                            <input
                                type="file"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="Example: Sunrise Readers"
                                name="book_path"
                                required
                            />
                        </div>
                        @error('book')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let logoInput = document.getElementById('thumbnail');

    let previewImg = document.getElementById('preview');



    logoInput.addEventListener('change', function () {
        let file = logoInput.files[0];
        let reader = new FileReader();

        reader.addEventListener('load', function () {
            previewImg.src = reader.result;
            previewImg.style.display = 'block';
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }, false);






</script>

@endsection
