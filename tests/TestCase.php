<?php

namespace Tests;

use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->refreshTestDatabase();

    }

    /**
     * @param string $email
     * @param string $pass
     * @return \Illuminate\Testing\TestResponse
     */
    public function login($email = 'test@test.com', $pass = 'testpass')
    {
        Session::start();

        return $this->post('/login', [
            'email' => $email,
            'password' => $pass,
            '_token' => csrf_token()
        ]);
    }

    /**
     * @return Authenticatable|null|User
     */
    public function user()
    {
        return Auth::user();
    }

    /**
     * @return void
     */
    private function truncateTables()
    {
        $exclusions = ['migrations'];

        $tables = $this->getTables();

        foreach ($tables as $table) {
            $table = (array) $table;

            if (!in_array($table[key($table)], $exclusions)) {
                DB::table($table[key($table)])->truncate();
            }
        }
    }

    /**
     * @return array
     */
    private function getTables()
    {
        if (env('DB_CONNECTION') == 'sqlite') {
            return DB::select("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name;");
        } else {
            return DB::select('SHOW TABLES');
        }
    }

    /**
     * @return void
     */
    protected function refreshTestDatabase()
    {
        if (config('database.default') !== 'sqlite') {
            if (! RefreshDatabaseState::$migrated) {
                info('test migrate:fresh');
                $this->artisan('migrate:fresh');

                RefreshDatabaseState::$migrated = true;
            }

            $this->truncateTables();
            $this->artisan('db:seed');

            return;
        }

        $this->makeSqlite();
    }

    /**
     * @return void
     */
    protected function makeSqlite(): void
    {
        if (!is_dir(storage_path('/db'))) {
            mkdir(storage_path('/db'));
            chmod(storage_path('/db'), 0777);
        }

        if (!file_exists('./storage/db/testdb-example.sqlite')) {
            $handler = fopen(storage_path('db/testdb.sqlite'), 'w');
            fclose($handler);

            chmod('./storage/db/testdb.sqlite', 0777);

            $this->artisan('migrate');
            $this->artisan('db:seed');

            copy('./storage/db/testdb.sqlite', './storage/db/testdb-example.sqlite');
            chmod('./storage/db/testdb-example.sqlite', 0777);
        }

        copy('./storage/db/testdb-example.sqlite', './storage/db/testdb.sqlite');
    }
}
