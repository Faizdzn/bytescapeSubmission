<?php

namespace App\View\Components;

use App\Models\Kelas;
use App\Models\KelasEntry;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KelasCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $kid = '1'
    )
    {
        $this->kid = $kid;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $kelasDt = Kelas::select()->where('kelas_id', $this->kid)->first();
        $pelajar = KelasEntry::select()->where('kelas_id', $this->kid)->count();

        return view('components.kelas-card', [
            'kdt' => $kelasDt,
            'pelajar' => $pelajar
        ]);
    }
}
