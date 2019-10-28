<?php
namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class DbConnection {
    private $driver = 'mysql';
    private $host = 'localhost';
    private $dbname = 'vida_renal';
    private $username = 'root';
    private $password = '';

    public function __construct () {
        $database = new Capsule;

        $database->addConnection([
            'driver'    => $this->driver,
            'host'      => $this->host,
            'database'  => $this->dbname,
            'username'  => $this->username,
            'password'  => $this->password,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        
        // Set the event dispatcher used by Eloquent models... (optional)
        $database->setEventDispatcher(new Dispatcher(new Container));
        
        // Make this Capsule instance available globally via static methods... (optional)
        $database->setAsGlobal();
        
        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $database->bootEloquent();
    }
}
