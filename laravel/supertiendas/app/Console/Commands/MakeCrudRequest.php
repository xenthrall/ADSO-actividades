<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeCrudRequest extends Command
{
    protected $signature = 'make:crud-request {name}';
    protected $description = 'Genera automáticamente Store y Update Requests para una entidad CRUD';

    public function handle()
    {
        $name = ucfirst($this->argument('name'));

        $requestPath = app_path("Http/Requests/{$name}");
        File::ensureDirectoryExists($requestPath);

        $storeRequest = $requestPath . "/Store{$name}Request.php";
        $updateRequest = $requestPath . "/Update{$name}Request.php";

        $namespace = "App\\Http\\Requests\\{$name}";

        $storeTemplate = <<<EOT
<?php

namespace {$namespace};

use Illuminate\Foundation\Http\FormRequest;

class Store{$name}Request extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255|unique:' . strtolower('{$name}') . 's,nombre',
            'descripcion' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.unique' => 'Ya existe una {$name} con ese nombre.',
            'nombre.max' => 'El nombre no puede superar los 255 caracteres.',
            'descripcion.max' => 'La descripción no puede superar los 1000 caracteres.',
        ];
    }
}
EOT;

        $updateTemplate = <<<EOT
<?php

namespace {$namespace};

use Illuminate\Foundation\Http\FormRequest;

class Update{$name}Request extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        \$id = \$this->route(strtolower('{$name}'))->id ?? null;

        return [
            'nombre' => 'required|string|max:255|unique:' . strtolower('{$name}') . 's,nombre,' . \$id,
            'descripcion' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.unique' => 'Ya existe otra {$name} con ese nombre.',
            'nombre.max' => 'El nombre no puede superar los 255 caracteres.',
            'descripcion.max' => 'La descripción no puede superar los 1000 caracteres.',
        ];
    }
}
EOT;

        File::put($storeRequest, $storeTemplate);
        File::put($updateRequest, $updateTemplate);

        $this->info("✔ Requests generados: Store{$name}Request y Update{$name}Request");
        return 0;
    }
}
