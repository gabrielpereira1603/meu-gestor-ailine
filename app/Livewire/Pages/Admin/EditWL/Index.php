<?php

namespace App\Livewire\Pages\Admin\EditWL;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\WhiteLabel;
use App\Models\Template;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    // ID da WhiteLabel que vamos editar
    public $wl_id;

    // 1) Campos principais
    public $name;
    public $slug;
    public $template_id;

    // 2) Overrides (textos e URLs)
    public $header_cta1_text;
    public $header_cta1_url;
    public $header_cta2_text;
    public $header_cta2_url;

    public $home_catchy_text;
    public $home_cta_text;
    public $home_cta_url;

    public $about_acc1_title;
    public $about_acc1_text;
    public $about_acc2_title;
    public $about_acc2_text;
    public $about_acc3_title;
    public $about_acc3_text;
    public $about_acc4_title;
    public $about_acc4_text;

    // 3) Para upload de novas imagens (opcionais)
    public $headerLogo;    // Livewire\TemporaryUploadedFile|null
    public $homeBgImage;   // Livewire\TemporaryUploadedFile|null

    // 4) Para exibir os URLs atuais de imagem (pré‐visualização)
    public $header_logo_url;   // string|null
    public $home_bg_image_url; // string|null

    // 5) Lista de templates para preencher o <select>
    public $templates = [];

    // Mensagem de sucesso / erro
    public $successMessage = '';

    protected function rules()
    {
        return [
            // Campos obrigatórios
            'name'        => ['required','string','max:255'],
            'slug'        => [
                'required','string','max:255',
                Rule::unique('white_labels','slug')->ignore($this->wl_id),
            ],
            'template_id' => ['required', 'exists:templates,id'],

            // HEADER CTAs
            'header_cta1_text' => ['nullable','string','max:100'],
            'header_cta1_url'  => ['nullable','url','max:255'],
            'header_cta2_text' => ['nullable','string','max:100'],
            'header_cta2_url'  => ['nullable','url','max:255'],

            // HOME
            'home_catchy_text' => ['nullable','string','max:255'],
            'home_cta_text'    => ['nullable','string','max:100'],
            'home_cta_url'     => ['nullable','url','max:255'],

            // ABOUT (cada título e texto)
            'about_acc1_title' => ['nullable','string','max:100'],
            'about_acc1_text'  => ['nullable','string'],
            'about_acc2_title' => ['nullable','string','max:100'],
            'about_acc2_text'  => ['nullable','string'],
            'about_acc3_title' => ['nullable','string','max:100'],
            'about_acc3_text'  => ['nullable','string'],
            'about_acc4_title' => ['nullable','string','max:100'],
            'about_acc4_text'  => ['nullable','string'],

            // Upload de imagens (opcional)
            'headerLogo'    => ['nullable','image','max:2048'], // até 2MB
            'homeBgImage'   => ['nullable','image','max:4096'], // até 4MB
        ];
    }

    protected $validationAttributes = [
        'name'                => 'Nome',
        'slug'                => 'Slug (URL)',
        'template_id'         => 'Template',
        'header_cta1_text'    => 'Texto CTA Header 1',
        'header_cta1_url'     => 'URL CTA Header 1',
        'header_cta2_text'    => 'Texto CTA Header 2',
        'header_cta2_url'     => 'URL CTA Header 2',
        'home_catchy_text'    => 'Texto Chamativo (Home)',
        'home_cta_text'       => 'Texto CTA (Home)',
        'home_cta_url'        => 'URL CTA (Home)',
        'about_acc1_title'    => 'Título Acordeon 1',
        'about_acc1_text'     => 'Texto Acordeon 1',
        'about_acc2_title'    => 'Título Acordeon 2',
        'about_acc2_text'     => 'Texto Acordeon 2',
        'about_acc3_title'    => 'Título Acordeon 3',
        'about_acc3_text'     => 'Texto Acordeon 3',
        'about_acc4_title'    => 'Título Acordeon 4',
        'about_acc4_text'     => 'Texto Acordeon 4',
        'headerLogo'          => 'Logo (Header)',
        'homeBgImage'         => 'Imagem de Fundo (Home)',
    ];

    public function mount($wl_id)
    {
        // 1) Armazena o ID
        $this->wl_id = $wl_id;

        // 2) Carrega lista de templates para o <select>
        $this->templates = Template::orderBy('name')->get();

        // 3) Carrega dados atuais da WhiteLabel
        $wl = WhiteLabel::findOrFail($this->wl_id);

        $this->name           = $wl->name;
        $this->slug           = $wl->slug;
        $this->template_id    = $wl->template_id;

        // Campos de override
        $this->header_cta1_text   = $wl->header_cta1_text;
        $this->header_cta1_url    = $wl->header_cta1_url;
        $this->header_cta2_text   = $wl->header_cta2_text;
        $this->header_cta2_url    = $wl->header_cta2_url;

        $this->home_catchy_text   = $wl->home_catchy_text;
        $this->home_cta_text      = $wl->home_cta_text;
        $this->home_cta_url       = $wl->home_cta_url;

        $this->about_acc1_title   = $wl->about_acc1_title;
        $this->about_acc1_text    = $wl->about_acc1_text;
        $this->about_acc2_title   = $wl->about_acc2_title;
        $this->about_acc2_text    = $wl->about_acc2_text;
        $this->about_acc3_title   = $wl->about_acc3_title;
        $this->about_acc3_text    = $wl->about_acc3_text;
        $this->about_acc4_title   = $wl->about_acc4_title;
        $this->about_acc4_text    = $wl->about_acc4_text;

        // URLs atuais das imagens (para preview)
        $this->header_logo_url   = $wl->header_logo_url;
        $this->home_bg_image_url = $wl->home_bg_image_url;

        // Não mantém uploads temporários
        $this->headerLogo  = null;
        $this->homeBgImage = null;

        $this->successMessage = '';
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function save()
    {
        // 1) Valida todos os campos
        $validated = $this->validate();

        // 2) Tratar upload de nova Logo (Header), se houver
        if ($this->headerLogo) {
            // Apaga a antiga, se existente
            if ($this->header_logo_url) {
                Storage::disk('public')->delete(Str::after($this->header_logo_url, '/storage/'));
            }
            $pathLogo = $this->headerLogo->store('white_labels/logos', 'public');
            $validated['header_logo_url'] = url('storage/' . $pathLogo);
        } else {
            // Mantém a URL antiga, se não enviou novo arquivo
            $validated['header_logo_url'] = $this->header_logo_url;
        }

        // 3) Tratar upload de nova Imagem de Fundo (Home), se houver
        if ($this->homeBgImage) {
            if ($this->home_bg_image_url) {
                Storage::disk('public')->delete(Str::after($this->home_bg_image_url, '/storage/'));
            }
            $pathBg = $this->homeBgImage->store('white_labels/backgrounds', 'public');
                $validated['home_bg_image_url'] = url('storage/' . $pathBg);
        } else {
            $validated['home_bg_image_url'] = $this->home_bg_image_url;
        }

        // 4) Preencher textos e URLs no array validado
        $validated['header_cta1_text'] = $this->header_cta1_text;
        $validated['header_cta1_url']  = $this->header_cta1_url;
        $validated['header_cta2_text'] = $this->header_cta2_text;
        $validated['header_cta2_url']  = $this->header_cta2_url;

        $validated['home_catchy_text'] = $this->home_catchy_text;
        $validated['home_cta_text']    = $this->home_cta_text;
        $validated['home_cta_url']     = $this->home_cta_url;

        $validated['about_acc1_title'] = $this->about_acc1_title;
        $validated['about_acc1_text']  = $this->about_acc1_text;
        $validated['about_acc2_title'] = $this->about_acc2_title;
        $validated['about_acc2_text']  = $this->about_acc2_text;
        $validated['about_acc3_title'] = $this->about_acc3_title;
        $validated['about_acc3_text']  = $this->about_acc3_text;
        $validated['about_acc4_title'] = $this->about_acc4_title;
        $validated['about_acc4_text']  = $this->about_acc4_text;

        // 5) Preencher campos principais
        $validated['name']        = $this->name;
        $validated['slug']        = $this->slug;
        $validated['template_id'] = $this->template_id;

        // 6) Atualizar no banco
        $wl = WhiteLabel::findOrFail($this->wl_id);
        $wl->update($validated);

        $this->successMessage = 'WhiteLabel atualizado com sucesso.';

        // Atualizar dados na tela (opcionalamente, você pode redirecionar)
        $this->mount($this->wl_id);
    }

    public function render()
    {
        return view('livewire.pages.admin.edit-w-l.index')
            ->layout('layouts.guest');
    }
}
