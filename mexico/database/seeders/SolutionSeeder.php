<?php

namespace Database\Seeders;

use App\Enums\ContentStatus;
use App\Enums\ContentType;
use App\Enums\SectionType;
use App\Models\Content;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SolutionSeeder extends Seeder
{
    public function run(): void
    {
        $solutions = [
            'ERP SICLA®',
            'Recursos Humanos',
            'Kommo CRM',
            'Digital Card',
            'NEXT-GATE',
            'Facturación Electrónica',
            'Microsoft / Google',
            'Telemetría GPS',
            'My Marchamo',
            'Marshal IA',
            'My Negocio .Shop',
            'Servicios de Agencia',
            'Innovate 360°',
            'Desarrollo de Software',
            'Formación IA'
        ];

        // Find a default author, e.g., superadmin or any user, or create one for seeder
        $author = User::whereHas('roles', fn($q) => $q->where('slug', 'superadmin'))->first();

        if (!$author) {
            throw new \RuntimeException(
                'SolutionSeeder requiere que exista al menos un usuario con rol SuperAdmin antes de sembrar las soluciones. Crea un usuario administrador primero.'
            );
        }

        foreach ($solutions as $solutionName) {
            $slug = Str::slug($solutionName);

            // Create Solution Content
            $content = Content::create([
                'author_id' => $author->id,
                'content_type' => ContentType::SOLUTION->value,
                'title' => $solutionName,
                'slug' => $slug,
                'excerpt' => 'TODO: REQUIERE CONTENIDO APROBADO',
                'body' => null,
                'status' => ContentStatus::DRAFT->value,
            ]);

            // Create basic SEO Metadata
            $content->seoMetadata()->create([
                'meta_title' => "$solutionName | NG Intelligence Group",
                'meta_description' => 'TODO: REQUIERE CONTENIDO APROBADO',
                'focus_keyword' => $solutionName,
            ]);

            // Create Sections based on standard structure
            $sections = [
                SectionType::HERO->value,
                SectionType::RICH_TEXT->value, // Problema/Solución can be rich text or features
                SectionType::BENEFITS->value,
                SectionType::FEATURES->value,
                SectionType::PROCESS->value, // Casos de uso / Proceso
                SectionType::FAQ->value,
                SectionType::VIDEO->value,
                SectionType::FORM->value,
                SectionType::CTA->value,
            ];

            foreach ($sections as $index => $type) {
                $content->sections()->create([
                    'section_type' => $type,
                    'internal_name' => "Sección " . ($index + 1) . " - " . ucfirst(str_replace('_', ' ', $type)),
                    'content' => 'TODO: REQUIERE CONTENIDO APROBADO',
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]);
            }
        }
    }
}
