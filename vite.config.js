import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/scss/app.scss",
                "resources/js/app.js",
                "resources/js/error.js",
                "resources/js/register.js",
                "resources/js/onboarding.js",
                "resources/js/searchStudents.js",
                "resources/js/searchCompanies.js",
                "resources/js/index.js",
                "resources/js/editProfile.js",
            ],
            refresh: true,
        }),
    ],
});
