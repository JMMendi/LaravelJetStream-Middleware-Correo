<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormEditarArticulo extends Form
{
    public ?Article $articulo = null;

    public string $title = "";

    #[Validate(['required', 'string', 'min:10', 'max:400'])]
    public string $content = "";

    #[Validate(['required', 'exists:tags,id'])]
    public int $tag_id = -1;

    public function fupdateArticle() {
        $this->validate();

        $this->articulo->update([
            'title' => $this->title,
            'content' => $this->content,
            'tag_id' => $this->tag_id,
        ]);

    }

    public function setArticulo(Article $articulo) {
        $this->articulo = $articulo;
        $this->title = $articulo->title;
        $this->content = $articulo->content;
        $this->tag_id = $articulo->tag_id;
    }

    public function resetearFormulario() {
        $this->resetValidation();
        $this->reset();
    }

    public function rules() : array {
        return [
            'title' => ['required', 'string', 'min:3', 'max:80', 'unique:articles,title,'.$this->articulo->id]
        ];
    }
}
