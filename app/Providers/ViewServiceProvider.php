<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Layouts
        Blade::component('components.layouts.app', 'app-layout');
        Blade::component('components.layouts.dashboard', 'dashboard-layout');
        Blade::component('components.layouts.guest', 'guest-layout');

        // Partials
        Blade::component('components.partials.navigation', 'navigation');

        // Branding
        Blade::component('components.branding.application-logo', 'application-logo');

        // Buttons
        Blade::component('components.buttons.primary-button', 'primary-button');
        Blade::component('components.buttons.danger-button', 'danger-button');
        Blade::component('components.buttons.secondary-button', 'secondary-button'); // ini ternyata di dropdowns

        // Forms
        Blade::component('components.forms.input-label', 'input-label');
        Blade::component('components.forms.text-input', 'text-input');
        Blade::component('components.forms.input-error', 'input-error');
        Blade::component('components.forms.auth-session-status', 'auth-session-status');

        // Dropdowns
        Blade::component('components.dropdowns.dropdown', 'dropdown');
        Blade::component('components.dropdowns.dropdown-link', 'dropdown-link');

        // Navigation
        Blade::component('components.nav.nav-link', 'nav-link');
        Blade::component('components.nav.responsive-nav-link', 'responsive-nav-link');

        // Modals
        Blade::component('components.modals.modal', 'modal');

        //posts
        Blade::component('components.posts.post-card', 'post-card');

    }
}
