<div id="view"></div>

@if($type == 'book')
    <script type="text/javascript">
        renderPDF('{{ asset("storage/backend/courses/course-chapter-books/" . $book) }}', document.getElementById('view'));
    </script>
@else
    <script type="text/javascript">
        renderPDF('{{ asset("storage/backend/courses/course-chapter-presentation-medias/" . $book) }}', document.getElementById('view'));
    </script>
@endif