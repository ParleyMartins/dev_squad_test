<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Product;

class importproducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all .csv files to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $files  = Storage::files('imports');
        if(count($files) > 0){
            foreach($files as $f){
                $contents = Storage::get($f);
                $contents = explode("\r\n", $contents);
                $keys = str_getcsv($contents[0]);

                for ($i = 1; $i < count($contents); $i++) {
                    $values = str_getcsv($contents[$i]);
                    $values = array_combine($keys, $values);

                    $prod = new Product($values);
                    $prod->image_url = '';
                    $prod->image_name = '';

                    $prod->save();
                }
            }

            print("Your import was completed.\n");
            Storage::delete($files);
        } else {
            print("No file to be imported.\n");
        }
    }
}
