<?php

namespace Texemus;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

/**
 * Class CreateTexemus
 * @package Texemus
 */
class CreateTexemus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:texemus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creation of a Texemus default Application';

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
        /**
         * Create Folders
         */
        $createFolders = new Process("mkdir app/Classes mkdir app/Classes/Traits mkdir app/Classes/Interfaces mkdir app/Classes/Observers mkdir app/Models mkdir app/Classes/Abstracts mkdir app/Models/Auth mkdir app/Http/ViewComposers mkdir app/Helpers");
        $createFolders->run();

        /**
         * UserModel
         */
        $moveUserModel = new Process("cp vendor/texemus/default/src/stubs/auth/UserModel.php app/Models/Auth/User.php");
        $moveUserModel->run();

        $removeUserModel = new Process("rm -rf app/User.php");
        $removeUserModel->run();
        /**
         * RegisterController
         */
        $removeRegisterController = new Process("rm -rf app/Http/Controllers/Auth/RegisterController.php");
        $removeRegisterController->run();

        $moveRegisterController = new Process("cp vendor/texemus/default/src/stubs/auth/RegisterController.php app/Http/Controllers/Auth/RegisterController.php");
        $moveRegisterController->run();

        /**
         * Auth Config
         */
        $removeAuthConfig = new Process("rm -rf config/auth.php");
        $removeAuthConfig->run();

        $moveAuthConfig = new Process("cp vendor/texemus/default/src/stubs/auth/AuthConfig.php config/auth.php");
        $moveAuthConfig->run();

        /**
         * Migrations
         */
        $removeMigrations = new Process("rm -rf database/migrations/*.*");
        $removeMigrations->run();

        $addNewMigrations = new Process("cp vendor/texemus/default/src/stubs/migrations/*.* database/migrations");
        $addNewMigrations->run();

        /**
         * Helpers
         */
        $moveHelperServiceProvider = new Process("cp vendor/texemus/default/src/stubs/helpers/HelperServiceProvider.php app/Providers/HelperServiceProvider.php");
        $moveHelperServiceProvider->run();

        $moveHelper = new Process("cp vendor/texemus/default/src/stubs/helpers/TranslationsHelper.php app/Helpers/TranslationsHelper.php");
        $moveHelper->run();

        /**
         * Core App
         */
        $removeApp = new Process("rm -rf config/app.php");
        $removeApp->run();

        $moveApp = new Process("cp vendor/texemus/default/src/stubs/core/app.php config/app.php");
        $moveApp->run();

        /**
         * Models
         */
        $moveModels = new Process("cp vendor/texemus/default/src/stubs/models/Core/*.* app/Models/Core");
        $moveModels->run();

        /**
         * File Handler
         */
        $moveFileHandler = new Process("cp vendor/texemus/default/src/stubs/files/FileHandler.php app/Classes/FileHandler.php");
        $moveFileHandler->run();

        /**
         * Abstracts
         */
        $moveAbstracts = new Process("cp vendor/texemus/default/src/stubs/Abstracts/*.* app/Classes/Abstracts");
        $moveAbstracts->run();

        /**
         * Permissions
         */

        $movePermissionChecker = new Process("cp vendor/texemus/default/src/stubs/auth/PermissionChecker.php app/Classes/PermissionChecker.php");
        $movePermissionChecker->run();

    }
}
