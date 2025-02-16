<?php

namespace App\Livewire;

use App\Livewire\Forms\FormCreateArticles;
use App\Models\Tag;
use Livewire\Component;

class CreateArticles extends Component
{
    public bool $abrirModalCrear = false;

    public FormCreateArticles $cform;

    public function render()
    {
        $tags = Tag::select('name', 'id')->orderBy('name')->get();
        return view('livewire.create-articles', compact('tags'));
    }

    public function abrirModal() {
        $this->abrirModalCrear = true;
    }

    public function cerrarModal() {
        $this->abrirModalCrear = false;
    }

    public function store() {
        $this->cform->formStoreArticle();
        $this->cerrarModal();

        $this->dispatch('onArticuloCreado')->to(ShowArticulosUser::class);
        $this->dispatch('mensaje', 'Artículo creado correctamente.');
    }

    public function cerrarCrear() {
        $this->cform->resetear();
        $this->abrirModalCrear = false;
    }
} 
