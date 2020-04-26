<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

/**
 * Class ApiCrudGenerator
 * @package App\Console\Commands
 */
class ApiCrudGenerator extends Command
{
    /** @var string */
    protected $signature = 'crud:generator {name : Class (singular) for example User}';
    /** @var string */
    protected $description = 'Create CRUD operations';

    /**
     * @return void
     */
    public function handle(): void
    {
        $name = $this->argument('name');

        $this->model($name);
        $this->filter($name);
        $this->notFound($name);
        $this->repository($name);
        $this->delete($name);
        $this->deleteHandler($name);
        $this->register($name);
        $this->registerHandler($name);
        $this->update($name);
        $this->updateHandler($name);
        $this->getList($name);
        $this->getListHandler($name);
        $this->controller($name);
        $this->request($name);
        $this->eloquentRepository($name);

        file_put_contents(
            base_path('routes/web.php'),
            '//Route::resource(\'' . Str::plural(strtolower($name)) . "', '{$name}Controller');",
            FILE_APPEND
        );
    }

    /**
     * @param string $name
     */
    protected function model(string $name)
    {
        $template = $this->variableTemplate($name, 'Model');

        if (!file_exists($path = base_path("app/Domain/{$name}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(base_path("app/Domain/{$name}/{$name}.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function filter(string $name)
    {
        $template = $this->variableTemplate($name, 'Filter');

        file_put_contents(base_path("app/Domain/{$name}/{$name}Filter.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function notFound(string $name)
    {
        $template = $this->variableTemplate($name, 'NotFound');

        file_put_contents(base_path("app/Domain/{$name}/{$name}NotFound.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function repository(string $name)
    {
        $template = $this->variableTemplate($name, 'Repository');

        file_put_contents(base_path("app/Domain/{$name}/{$name}Repository.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function delete(string $name)
    {
        $template = $this->variableTemplate($name, 'Delete');

        if (!file_exists($path = base_path("app/Application/{$name}/Delete{$name}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(base_path("app/Application/{$name}/Delete{$name}/Delete{$name}.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function deleteHandler(string $name)
    {
        $template = $this->variableTemplate($name, 'DeleteHandler');

        file_put_contents(base_path("app/Application/{$name}/Delete{$name}/Delete{$name}Handler.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function register(string $name)
    {
        $template = $this->variableTemplate($name, 'Register');

        if (!file_exists($path = base_path("app/Application/{$name}/Register{$name}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(base_path("app/Application/{$name}/Register{$name}/Register{$name}.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function registerHandler(string $name)
    {
        $template = $this->variableTemplate($name, 'RegisterHandler');

        file_put_contents(base_path("app/Application/{$name}/Register{$name}/Register{$name}Handler.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function update(string $name)
    {
        $template = $this->variableTemplate($name, 'Update');

        if (!file_exists($path = base_path("app/Application/{$name}/Update{$name}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(base_path("app/Application/{$name}/Update{$name}/Update{$name}.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function updateHandler(string $name)
    {
        $template = $this->variableTemplate($name, 'UpdateHandler');

        file_put_contents(base_path("app/Application/{$name}/Update{$name}/Update{$name}Handler.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function getList(string $name)
    {
        $template = $this->variableTemplate($name, 'GetList');

        if (!file_exists($path = base_path("app/Application/{$name}/Get{$name}List"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(base_path("app/Application/{$name}/Get{$name}List/Get{$name}List.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function getListHandler(string $name)
    {
        $template = $this->variableTemplate($name, 'GetListHandler');

        file_put_contents(base_path("app/Application/{$name}/Get{$name}List/Get{$name}ListHandler.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function eloquentRepository(string $name)
    {
        $template = $this->variableTemplate($name, 'EloquentRepository');

        if (!file_exists($path = base_path("app/Infrastructure/Eloquent"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(base_path("app/Infrastructure/Eloquent/Eloquent{$name}Repository.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function controller(string $name)
    {
        $template = $this->variableTemplate($name, 'Controller');

        file_put_contents(base_path("app/Http/Controllers/{$name}Controller.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function request(string $name)
    {
        $template = $this->variableTemplate($name, 'Request');

        if (!file_exists($path = base_path("app/Http/Requests/{$name}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(base_path("app/Http/Requests/{$name}/{$name}Request.php"), $template);
    }

    /**
     * @param string $name
     */
    protected function test(string $name)
    {
        $template = $this->variableTemplate($name, 'Test');

        if (!file_exists($path = base_path("tests/Feature"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(base_path("tests/Feature/{$name}Test.php"), $template);
    }

    /**
     * @param $type
     * @return false|string
     */
    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    /**
     * @param string $name
     * @param string $template
     * @return string|string[]
     */
    protected function variableTemplate(string $name, string $template)
    {
        return str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            $this->getStub($template)
        );
    }
}
