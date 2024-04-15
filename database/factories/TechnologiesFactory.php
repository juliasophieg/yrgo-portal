<?php

namespace Database\Factories;

use App\Models\Technologies;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Technologies>
 */
class TechnologiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        $webDevelopmentTechnologies = array(
            "HTML5",
            "CSS3",
            "JavaScript (ES6+)",
            "React.js",
            "Vue.js",
            "Angular",
            "Node.js",
            "Next.js",
            "Nuxt.js",
            "Svelte",
            "Django",
            "Flask",
            "Ruby on Rails",
            "Laravel",
            "ASP.NET",
            "MongoDB",
            "MySQL",
            "PostgreSQL",
            "Firebase",
            "GraphQL",
            "RESTful APIs",
            "WebSocket",
            "Webpack",
            "TypeScript",
            "Sass/SCSS",
            "Less",
            "Tailwind CSS",
            "Cypress",
            "Storyblock",
            "Docker",
            "Kubernetes",
            "AWS (Amazon Web Services)",
            "Google Cloud Platform",
            "Microsoft Azure",
            "Netlify",
            "Vercel",
            "Heroku",
            "CircleCI",
            "Travis CI",
            "Gulp",
            "Grunt",
            "Git",
            "Wordpress",
            "Figma",
            "Webflow",
            "Adobe Photoshop",
            "Adobe Illustrator",
            "Adobe After Effects",
            "Adobe Premiere Pro",
            "Adobe InDesign",
            "Adobe Stager",
            "Affinity Designer",
            "Affinity Photo",
            "Gravit Designer",
            "Canva",
            "Brackets",
            "Blender",
            "Sketch",
            "Maze",
            "Squarespace",
            "Gimp",
            "Inkspace",
            "Spline",
            "Resolve"

        );

        $existingNames = Technologies::pluck('name')->toArray();
        $availableNames = array_diff($webDevelopmentTechnologies, $existingNames);

        if (empty($availableNames)) {
            throw new Exception('All technology names have been used');
        }

        $randomName = $availableNames[array_rand($availableNames)];

        return [
            'name' => $randomName
        ];
    }
}
