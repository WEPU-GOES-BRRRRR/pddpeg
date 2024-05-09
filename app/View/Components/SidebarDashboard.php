<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarDashboard extends Component
{
    protected $menus;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = [
            [
                'name' => 'Pegawai',
                'url' => 'pegawai.index',
                'icon' => '<i class="fa-solid fa-users"></i>',
                'slug' => 'pegawai',
            ],
            [
                'name' => 'Data Keluarga',
                'url' => 'pegawai.keluarga.index',
                'icon' => '<i class="fa-solid fa-users"></i>',
                'slug' => 'keluarga',
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.partials.sidebar-dashboard', [
            'menus' => $this->menus
        ]);
    }
}
