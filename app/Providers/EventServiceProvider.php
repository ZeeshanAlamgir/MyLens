<?php

namespace App\Providers;

use App\Repositories\Interfaces\ActorProductInterface;
use App\Repositories\Interfaces\BannerInterface;
use App\Repositories\Interfaces\BecomeSellerInterface;
use App\Repositories\Interfaces\CertificateInterface;
use App\Repositories\Interfaces\CityInterface;
use App\Repositories\Interfaces\CollectionInterface;
use App\Repositories\Interfaces\ColorInterface;
use App\Repositories\Interfaces\ContactUsInterface;
use App\Repositories\Interfaces\DistributorInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Interfaces\ReplacementCycleInterface;
use App\Repositories\Interfaces\StoreCityInterface;
use App\Repositories\Interfaces\StoreInterface;
use App\Repositories\Interfaces\StyleInterface;
use App\Repositories\Interfaces\ToneInterface;
use App\Repositories\Interfaces\TypeInterface;
use App\Repositories\Services\ActorProductService;
use App\Repositories\Services\BannerService;
use App\Repositories\Services\BecomeSellerService;
use App\Repositories\Services\CertificateService;
use App\Repositories\Services\CityService;
use App\Repositories\Services\CollectionService;
use App\Repositories\Services\ColorService;
use App\Repositories\Services\ContactUsService;
use App\Repositories\Services\DistributorService;
use App\Repositories\Services\ProductService;
use App\Repositories\Services\ReplacementCycleService;
use App\Repositories\Services\StoreCityService;
use App\Repositories\Services\StoreService;
use App\Repositories\Services\StyleService;
use App\Repositories\Services\ToneService;
use App\Repositories\Services\TypeService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ColorInterface::class,ColorService::class);
        $this->app->bind(CollectionInterface::class,CollectionService::class);
        $this->app->bind(ReplacementCycleInterface::class,ReplacementCycleService::class);
        $this->app->bind(ToneInterface::class,ToneService::class);
        $this->app->bind(StyleInterface::class,StyleService::class);
        $this->app->bind(TypeInterface::class,TypeService::class);
        $this->app->bind(DistributorInterface::class,DistributorService::class);
        $this->app->bind(StoreInterface::class,StoreService::class);
        $this->app->bind(ProductInterface::class,ProductService::class);
        $this->app->bind(ActorProductInterface::class,ActorProductService::class);
        $this->app->bind(BannerInterface::class,BannerService::class);
        $this->app->bind(CertificateInterface::class,CertificateService::class);
        $this->app->bind(ContactUsInterface::class,ContactUsService::class);
        $this->app->bind(StoreCityInterface::class,StoreCityService::class);
        $this->app->bind(BecomeSellerInterface::class,BecomeSellerService::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
