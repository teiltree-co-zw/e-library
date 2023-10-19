@extends('layouts.library')

@section('content')
    <div class="row">
<div class="col-md-12">
    <h4 class="card-title">Reading: {{ $book->name }}</h4>
    <a href="{{ route('close', $book) }}" class="btn btn-success btn-sm float-end"><i class="mdi mdi-folder-plus"></i> Go to Library</a>
</div>

    </div>
        <div class="row mt-4 mb-5">
            <div class="col-lg-2 col-md-2 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <img width="80%" src="{{ asset('uploads/books/thumbnails/'.$book->thumbnail) }}" alt="{{ $book->name }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12">
                <div class="container">
                    <div class="btn-group-vertical" role="group" aria-label="Basic example">
                        <button type="button" id="prev-page" class="btn btn-outline-success">
                            <i class="mdi mdi-format-vertical-align-top"></i> Prev
                        </button>
                        <button type="button" disabled class="btn btn-outline-secondary">
                            Page <span id="page-number"></span> / <span id="page-numbers"></span>
                        </button>
                        <button type="button" id="next-page" class="btn btn-outline-success">
                            <i class="mdi mdi-format-vertical-align-bottom"></i> Next
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div id="pdf-container"></div>
                    </div>
                </div>
            </div>
        </div>



    <script>
        // URL of the PDF file
        let url = "{{ asset($book->book_path) }}";

        let pageNumbers = document.getElementById('page-numbers');
        let pageNum = document.getElementById('page-number');

        // Asynchronously load and render the PDF
        pdfjsLib.getDocument(url).promise.then(function(pdf) {
            // Get the total number of pages in the PDF
            const numPages = pdf.numPages;
            pageNumbers.innerText = numPages;

            // Set the initial page number
            let pageNumber = 1;

            // Variable to store the currently displayed canvas
            let currentCanvas;

            // Function to render a specific page
            function renderPage(pageNumber) {
                pageNum.innerText = pageNumber;
                pdf.getPage(pageNumber).then(function(page) {
                    // Set the desired scale for rendering the PDF
                    const scale = 1.1;

                    // Get the viewport of the page at the desired scale
                    const viewport = page.getViewport({scale: scale});

                    // Create a canvas element
                    const canvas = document.createElement("canvas");

                    // Set the canvas dimensions to match the viewport
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Append the canvas to the PDF container element
                    document.getElementById("pdf-container").appendChild(canvas);

                    // Get the rendering context of the canvas
                    const context = canvas.getContext("2d");

                    // Render the page on the canvas
                    page.render({ canvasContext: context, viewport: viewport });

                    // Hide the previous canvas if it exists
                    if (currentCanvas) {
                        currentCanvas.style.display = "none";
                    }

                    // Set the current canvas to the newly rendered canvas
                    currentCanvas = canvas;
                });
            }

            // Render the initial page
            renderPage(pageNumber);

            // Optional: Add navigation buttons or controls to change pages
            // Example navigation buttons:
            document.getElementById("prev-page").addEventListener("click", function() {
                if (pageNumber > 1) {
                    pageNumber--;
                    renderPage(pageNumber);
                }
            });

            document.getElementById("next-page").addEventListener("click", function() {
                if (pageNumber < numPages) {
                    pageNumber++;
                    renderPage(pageNumber);
                }
            });
        });
    </script>

@endsection
