<?php

namespace App\UI\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class KeyGenerateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'key:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Set the application key";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $key = $this->getRandomKey();

        $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents(
                $path,
                preg_replace(
                    $this->keyReplacementPattern($key),
                    'APP_KEY=' . $key,
                    file_get_contents($path)
                )
            );
        }

        $this->info("Application key [$key] set successfully.");
    }

    /**
     * Get a regex pattern that will match env APP_KEY with any random key.
     *
     * @return string
     */
    protected function keyReplacementPattern(): string
    {
        $currentKey = env('APP_KEY');
        $escaped = preg_quote('=' . $currentKey, '/');

        return "/^APP_KEY{$escaped}/m";
    }

    /**
     * Generate a random key for the application.
     *
     * @return string
     */
    protected function getRandomKey(): string
    {
        return Str::random(32);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['show', null, InputOption::VALUE_NONE, 'Simply display the key instead of modifying files.'],
        ];
    }
}
