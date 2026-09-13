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
                ['type' => SectionType::HERO->value, 'name' => 'Hero'],
                ['type' => SectionType::RICH_TEXT->value, 'name' => 'Problema'],
                ['type' => SectionType::RICH_TEXT->value, 'name' => 'Solución'],
                ['type' => SectionType::BENEFITS->value, 'name' => 'Beneficios'],
                ['type' => SectionType::FEATURES->value, 'name' => 'Características'],
                ['type' => SectionType::RICH_TEXT->value, 'name' => 'Casos de uso'],
                ['type' => SectionType::PROCESS->value, 'name' => 'Proceso'],
                ['type' => SectionType::FAQ->value, 'name' => 'FAQ'],
                ['type' => SectionType::VIDEO->value, 'name' => 'Video'],
                ['type' => SectionType::FORM->value, 'name' => 'Formulario'],
                ['type' => SectionType::CTA->value, 'name' => 'CTA'],
            ];

            foreach ($sections as $index => $section) {
                $content->sections()->create([
                    'section_type' => $section['type'],
                    'internal_name' => "Sección " . ($index + 1) . " - " . $section['name'],
                    'content' => 'TODO: REQUIERE CONTENIDO APROBADO',
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]);
            }
        }
    }
}
