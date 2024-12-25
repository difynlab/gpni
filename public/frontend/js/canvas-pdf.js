function renderPDF(url, canvasContainer, options) {

    options = options || { scale: 1};
        
    function renderPage(page) {
        var viewport = page.getViewport(options.scale);
        var wrapper = document.createElement("div");
        wrapper.className = "canvas-wrapper";
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        var renderContext = {
          canvasContext: ctx,
          viewport: viewport
        };
        
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        wrapper.appendChild(canvas)
        canvasContainer.appendChild(wrapper);
        
        page.render(renderContext);
    }
    
    async function renderPages(pdfDoc) {
        for (let num = 1; num <= pdfDoc.numPages; num++) {
            const page = await pdfDoc.getPage(num);
            renderPage(page);
        }
    }


    PDFJS.disableWorker = true;
    PDFJS.getDocument(url).then(renderPages);

}   