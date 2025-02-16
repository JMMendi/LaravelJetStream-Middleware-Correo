<?php

namespace App\Livewire;

use App\Livewire\Forms\FormEditarArticulo;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowArticulosUser extends Component
{
    use WithPagination;

    public string $campo = "id", $orden = 'desc';
    public string $texto = "";

    public FormEditarArticulo $uform;
    public bool $abrirModalEditar = false;

    #[On('onArticuloCreado', 'onArticuloBorrado')]
    public function render()
    {

        $articulos = DB::table('articles')
        ->join('tags', 'tag_id', "=", "tags.id")
        ->select("articles.*", "name")
        ->where("user_id", "=", Auth::user()->id)
        ->where(function($q) {
            $q->where('title', 'like', "%{$this->texto}%")
            ->orWhere('content', 'like', "%{$this->texto}%")
            ->orWhere('name', 'like', "%{$this->texto}%");
        })
        ->orderBy($this->campo, $this->orden)
        ->paginate(5);

        $tags = Tag::select('name', 'id')->orderBy('name')->get();

        return view('livewire.show-articulos-user', compact('articulos', 'tags'));
    }

    public function ordenar(string $campo) {
        $this->orden = ($this->orden == "asc") ? "desc" : "asc";
        $this->campo = $campo;
    }

    public function updatingTexto() {
        $this->resetPage();
    }

    // ------------------- Borrar

    public function confirmarBorrado(Article $articulo) {
        $this->authorize('delete', $articulo);
        $this->dispatch('onBorrarArticulo', $articulo->id);
    }

    #[On('borrarOk')]
    public function eliminarArticulo(Article $articulo) {
        $this->authorize('delete', $articulo);

        $articulo->delete();
        $this->dispatch('mensaje', 'Artículo eliminado correctamente');
    }

    // ---------------------- Editar

    public function abrirModalUpdate(Article $articulo) {
        $this->authorize('update', $articulo);

        $this->uform->setArticulo($articulo);
        $this->abrirModalEditar = true;
    }

    public function editarArticulo() {
        $this->authorize('update', $this->uform->articulo);

        $this->uform->fupdateArticle();

        $this->dispatch('mensaje', 'Artículo editado correctamente');
        $this->abrirModalEditar = false;
    }

    public function cerrarModalUpdate() {
        $this->uform->resetearFormulario();
        $this->abrirModalEditar = false;
    }
}
