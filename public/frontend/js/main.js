// Initialize tooltips
const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]',
);
const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl),
);
// Initialize tooltips

// Prevent too many clicks
document.querySelectorAll("form").forEach(function (form) {
    form.addEventListener("submit", function (event) {
        form.querySelectorAll('button, input[type="submit"]').forEach(
            function (button) {
                button.disabled = true;
            },
        );
    });
});
// Prevent too many clicks

// html editor
document.querySelectorAll(".editor").forEach((element) => {
    ClassicEditor.create(element, {
        heading: {
            options: [
                {
                    model: "heading1",
                    view: "h1",
                    title: "Heading 1",
                    class: "ck-heading_heading1",
                },
                {
                    model: "heading2",
                    view: "h2",
                    title: "Heading 2",
                    class: "ck-heading_heading2",
                },
                {
                    model: "heading3",
                    view: "h3",
                    title: "Heading 3",
                    class: "ck-heading_heading3",
                },
                {
                    model: "paragraph",
                    title: "Paragraph",
                    class: "ck-heading_paragraph",
                },
            ],
        },
        mediaEmbed: {
            previewsInData: true,
        },
    })
        .then((newEditor) => {})
        .catch((error) => {
            console.error(error);
        });
});
// html editor