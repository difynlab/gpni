<script>
        document.addEventListener('DOMContentLoaded', function() {
            const pdfScript = document.createElement('script');
            pdfScript.src = "{{ asset('frontend/js/pdf.js') }}";
            
            pdfScript.onload = function() {
                const pdfWorkerScript = document.createElement('script');
                pdfWorkerScript.src = "{{ asset('frontend/js/pdf-worker.js') }}";

                pdfWorkerScript.onload = function() {
                    initializePDFViewer();
                };
                
                document.head.appendChild(pdfWorkerScript);
            };

            document.head.appendChild(pdfScript);
        });

        function initializePDFViewer() {
            $('.btn-read-document').on('click', function() {
                const book = $(this).attr('data-book');
                const url = `{{ url('storage/backend/courses/course-chapter-books/__FILE__') }}`.replace('__FILE__', book);
                
                pdfjsLib.GlobalWorkerOptions.workerSrc = "{{ asset('frontend/js/pdf-worker.js') }}";
                
                const loadingTask = pdfjsLib.getDocument({
                    url: url,
                    withCredentials: true,
                    cMapUrl: 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.15.349/cmaps/',
                    cMapPacked: true,
                    disableStream: false,
                    disableAutoFetch: false
                });

                loadingTask.promise.then(pdfDoc => {
                    const viewer = document.getElementById('pdf-viewer');
                    viewer.innerHTML = '<div id="pages-container"></div>';
                    const pagesContainer = document.getElementById('pages-container');
                    
                    const pagePromises = [];
                    for(let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                        pagePromises.push(renderPage(pdfDoc, pageNum, pagesContainer));
                    }
                    
                    return Promise.all(pagePromises);
                }).catch(error => {
                    console.error('Error loading PDF:', error);
                    document.getElementById('pdf-viewer').innerHTML = 
                        '<div class="alert alert-danger">Error loading PDF. Please try again.</div>';
                });
            });
        }

        async function renderPage(pdfDoc, pageNum, container) {
            const page = await pdfDoc.getPage(pageNum);
            const scale = 1.5;
            const viewport = page.getViewport({ scale });
            
            const wrapper = document.createElement('div');
            wrapper.className = 'page-wrapper';
            
            const canvas = document.createElement('canvas');
            canvas.className = 'pdf-page';
            const context = canvas.getContext('2d');
            
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            
            wrapper.appendChild(canvas);
            container.appendChild(wrapper);
            
            return page.render({
                canvasContext: context,
                viewport: viewport
            }).promise;
        }

        $('#pdf-modal').on('hidden.bs.modal', function () {
            document.getElementById('pdf-viewer').innerHTML = '';
        });
    </script>