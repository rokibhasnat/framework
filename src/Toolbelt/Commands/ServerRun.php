<?php

declare(strict_types=1);

namespace FondBot\Toolbelt\Commands;

use FondBot\Toolbelt\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\ProcessUtils;

class ServerRun extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('serve')
            ->setDescription('Run server')
            ->addOption('host', null, InputArgument::OPTIONAL, 'The host address to serve the application on.', '127.0.0.1')
            ->addOption('port', null, InputArgument::OPTIONAL, 'The port to serve the application on.', '8000');
    }

    /**
     * Get the port for the command.
     *
     * @return string
     */
    protected function port()
    {
        return $this->input->getOption('port');
    }

    /**
     * Get the host for the command.
     *
     * @return string
     */
    protected function host()
    {
        return $this->input->getOption('host');
    }

    /**
     * Get the full server command.
     *
     * @return string
     */
    protected function serverCommand() : string
    {
        return sprintf('%s -S %s:%s %s/public/index.php',
            ProcessUtils::escapeArgument((new PhpExecutableFinder)->find(false)),
            $this->host(),
            $this->port(),
            ProcessUtils::escapeArgument(path())
        );
    }

    public function handle(): void
    {
        chdir(path());
        $this->line("<info>Fondbot development server started:</info> <http://{$this->host()}:{$this->port()}>");
        passthru($this->serverCommand());
    }

}
