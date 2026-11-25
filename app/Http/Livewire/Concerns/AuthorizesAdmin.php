<?php

namespace App\Http\Livewire\Concerns;

trait AuthorizesAdmin
{
    protected function ensureAdmin(): void
    {
        abort_unless(auth()->check() && optional(auth()->user()->role)->role === 'admin', 403);
    }
}
