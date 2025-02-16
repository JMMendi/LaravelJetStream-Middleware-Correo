<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormCreateArticles extends Form
{
    #[Validate(['required', 'string', 'min:3', 'max:80', 'unique:articles,title'])]
    public string $title = "";

    #[Validate(['required', 'string', 'min:10', 'max:400'])]
    public string $content = "";

    #[Validate(['required', 'exists:tags,id'])]
    public int $tag_id = -1;

    public function formStoreArticle() {
        $this->validate();

        Article::create([
            'title' => $this->title,
            'content' => $this->content,
            'tag_id' => $this->tag_id,
            'user_id' => Auth::user()->id,
        ]);
    }

    public function resetear() {
        $this->resetValidation();
        $this->reset();
    }

 }
