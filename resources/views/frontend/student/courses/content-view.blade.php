<?php

$file = $book;

?>
    <div class="frame_div01 unit_content_video">
        <div class="frame-div01-box">
            <div class="d-frame01-overlay"></div>
            <div class="canvas_box02" id="pdfview" style="height: 80vh; overflow: auto;
            overflow-x: hidden; text-align: center;"> 
            </div>
        </div>
        <hr>
    </div>

    <script type="text/javascript">
        renderPDF('{{ asset("storage/backend/courses/course-chapter-books/" . $file) }}', document.getElementById('pdfview'));
    </script>  


<style>
    .canvas-wrapper canvas {
        width: 100%;
    }
</style>