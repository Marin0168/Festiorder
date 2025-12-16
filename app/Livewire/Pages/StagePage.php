<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class StagePage extends Component
{
    public string $stage;

    public function mount(string $stage): void
    {
        $this->stage = $stage;
    }

    public function render()
    {
        return view('livewire.pages.stage', [
            'stage' => $this->stage,
        ]);
    }
}
