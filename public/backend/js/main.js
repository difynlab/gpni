// html editor
    document.querySelectorAll('.editor').forEach(element => {
        ClassicEditor
            .create(element, {
                ckfinder: {
                    uploadUrl: uploadUrl,
                },
            })
            .then(newEditor => {})
            .catch(error => {
                console.error(error);
            });
    });
// html editor


// Prevent too many clicks
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if(form.checkValidity()) {
                form.querySelectorAll('.submit-button, .delete-button').forEach(function(button) {
                    button.disabled = true;
                });
            }
            else {
                form.reportValidity();
                event.preventDefault();
            }
        });
    });
// Prevent too many clicks


// Sidebar scrollbar
    $(document).ready(function () {
        function adjustSubMenuHeight($menu) {
            let viewportHeight = $(window).height();
            let menuOffsetTop = $menu.offset().top;
            let availableSpace = viewportHeight - menuOffsetTop - 5;

            $menu.css("max-height", "");

            if($menu.outerHeight() > availableSpace) {
                $menu.css("max-height", availableSpace + "px").addClass("scrollable");
            }
            else {
                $menu.removeClass("scrollable");
            }
        }

        $(".wrapper .sidebar > ul > li").on("mouseenter", function () {
            let $subMenu = $(this).find(".sub-menu");

            if($subMenu.length) {
                $(".sub-menu").css("max-height", "").removeClass("scrollable");
                adjustSubMenuHeight($subMenu);
            }
        });

        $(window).on("resize", function () {
            $(".wrapper .sidebar .sub-menu").each(function () {
                adjustSubMenuHeight($(this));
            });
        });
    });
// Sidebar scrollbar