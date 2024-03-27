<?php

namespace Database\Factories;

use App\Models\Technologies;
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
            "Express.js",
            "Next.js",
            "Nuxt.js",
            "Svelte",
            "Django",
            "Flask",
            "Ruby on Rails",
            "Laravel",
            "ASP.NET Core",
            "MongoDB",
            "MySQL",
            "PostgreSQL",
            "Firebase",
            "GraphQL",
            "RESTful APIs",
            "WebSocket",
            "Webpack",
            "Babel",
            "TypeScript",
            "Sass/SCSS",
            "Less",
            "Tailwind CSS",
            "Bootstrap",
            "Material-UI",
            "Chakra UI",
            "Jest",
            "React Testing Library",
            "Cypress",
            "Storybook",
            "Docker",
            "Kubernetes",
            "AWS (Amazon Web Services)",
            "Google Cloud Platform",
            "Microsoft Azure",
            "Netlify",
            "Vercel",
            "Heroku",
            "GitHub Actions",
            "CircleCI",
            "Travis CI",
            "Webpack",
            "Gulp",
            "Grunt",
            "NPM (Node Package Manager)",
            "Yarn",
            "ESLint",
            "Prettier",
            "Visual Studio Code",
            "Atom",
            "Sublime Text",
            "WebStorm",
            "Git",
            "GitHub",
            "GitLab",
            "Bitbucket"
        );

        $webDesignTechnologies = array(
            "Figma",
            "Adobe XD",
            "Sketch",
            "InVision",
            "Zeplin",
            "Abstract",
            "Marvel",
            "Axure RP",
            "Webflow",
            "Adobe Photoshop",
            "Adobe Illustrator",
            "Adobe After Effects",
            "Adobe Premiere Pro",
            "Affinity Designer",
            "Affinity Photo",
            "Gravit Designer",
            "Canva",
            "Balsamiq",
            "Moqups",
            "Proto.io",
            "Principle",
            "Origami Studio",
            "Flinto",
            "Adobe Dreamweaver",
            "Sublime Text",
            "Visual Studio Code",
            "Atom",
            "Brackets",
            "Notepad++"
        );

        $technologies = array_merge($webDevelopmentTechnologies, $webDesignTechnologies);

        return [
            "name" => function () use ($technologies) {
                // Shuffle the array to randomize the order of elements
                shuffle($technologies);

                // Loop through the shuffled array and return the first unique name found
                foreach ($technologies as $technology) {
                    if (!Technologies::where('name', $technology)->exists()) {
                        return $technology;
                    }
                }
                // If all names are already used, fallback to a random word
                return $this->faker->word;
            }
        ];
    }
}
