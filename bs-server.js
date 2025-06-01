const browserSync = require('browser-sync').create();

browserSync.init({
    proxy: "http://127.0.0.1:8001",
    host: "127.0.0.1",
    port: 8000,
    open: false,
    files: [
        "app/**/*.php",
        "routes/**/*.php",
        "resources/views/**/*.php",
        "public/**/*.css",
        "public/**/*.js"
    ]
});